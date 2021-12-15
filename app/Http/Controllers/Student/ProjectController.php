<?php

namespace App\Http\Controllers\Student;

use App\Actions\CodeAllocation\Allocation;
use App\Actions\CodeAllocation\MarkReviewAllocation;
use App\Actions\CodeUpload\Upload;
use App\Actions\Project\ProjectCreate;
use App\Actions\Team\FeatureBranchTeamCreation;
use App\Actions\Team\IndividualTeamCreation;
use App\Actions\Team\TeamCreation;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ProjectCreated;

class ProjectController extends Controller
{
    public function index()
    {
        $project_data = Project::whereUserId(Auth::id())->get();

        // tldr need to setup some more relations to get more project data

        return view('v1.project.index', compact('project_data'));
    }

    public function create()
    {
        return view('v1.project.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code-upload'  => 'required|mimes:tar,tar.gz,zip|max:50000',
            'project_name' => 'required|min:3|max:255',
            'team_type'    => 'required|in:IndividualTeamCreation,FeatureBranchTeamCreation,TeamCreation',
        ]);

        // Trigger Project Creation
        $projectStrategy = $this->projectStrategy()->create($request);
        $projectStrategy->setStatus('Created');

        // Trigger Team Creation
        $teamStrategy = $this->teamStrategy()->create($request, $projectStrategy);

        // Upload Zip
        $upload = new Upload();
        $upload = $upload->upload($request, $projectStrategy);

        // How do we handle this if the upload zip fails?? auto delete project stratgey automagically, let user delete, cron job deletion??

        // Allocate Code
        $allocate = new Allocation();
        $allocate = $allocate->first_allocation($projectStrategy, $teamStrategy);

        // Allocate 2nd Mark
        $alloc_2 = new MarkReviewAllocation();
        $alloc_2 = $alloc_2->first_allocation($projectStrategy, $teamStrategy);

        // Send an email notif to the user to let them know all is okay
        $user = User::whereId(Auth::id())->firstOrFail();
        $user->notify(new ProjectCreated($projectStrategy));

        return redirect()->route('projects.index')->with('message', 'Project Created!');
    }

    /**
     * Show Users Projects.
     */
    public function show(Request $request)
    {
        $project_data = Project::whereUserId(Auth::id())->whereId($request->route('id'))->with('source', 'marks', 'mark_review_marks')->firstOrFail();

        return view('v1.project.show', compact('project_data'));
    }

    public function teamStrategy()
    {
        $team_type = request('team_type');

        $strategy = [

            'IndividualTeamCreation'    => new IndividualTeamCreation(),
            'FeatureBranchTeamCreation' => new FeatureBranchTeamCreation(),
            'TeamCreation'              => new TeamCreation(),
        ];

        if (!array_key_exists($team_type, $strategy)) {
            throw new \Exception('Could not find team type strategy');
        }

        return $strategy[$team_type];
    }

    public function projectStrategy()
    {

        // Do not technically *need* this, but keeping if team creation types ever changes.
        // Could refactor to upload style...??

        $team_type = 'create';

        $strategy = [

            'create' => new ProjectCreate(),

        ];

        if (!array_key_exists($team_type, $strategy)) {
            throw new \Exception('Could not find project create strategy');
        }

        return $strategy[$team_type];
    }
}
