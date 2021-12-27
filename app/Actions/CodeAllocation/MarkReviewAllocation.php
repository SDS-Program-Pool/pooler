<?php

namespace App\Actions\CodeAllocation;

use App\Models\Project;
use App\Models\ProjectMarkReviewAllocation;
use App\Models\User;

class MarkReviewAllocation
{
    public function first_allocation($projectStrategy, $teamStrategy)
    {
        $team_members = $this->team_members($projectStrategy->id);

        $markers = Project::whereId($projectStrategy->id)->firstorFail();

        foreach ($markers->team_members as $member) {
            $team_member_user_id[] = $member->user_id;
        }

        foreach ($markers->mark_allocations as $marker) {
            $marker_user_id[] = $marker->user_id;
        }

        $array = array_merge($team_members, $marker_user_id);

        $users = User::whereNotIn('id', $array)->get();

        foreach ($users as $user) {
            $users_array[] = $user->id;
        }

        // dd($array);

        //dd($users_array);

        if (sizeof($users_array) < 3) {
            // log unavail to allocate the project, manual allocation required.
            return redirect()->route('projects.index')->with('message', 'Unable to allocate mark review people to project to a marker');
        }

        // Generate the array keys of 3 random markers
        $markers_array = array_rand($users_array, 3);
        // requires an if statement to check if users array contains data and to do array rand.
        // else just return a warning that the code could not be allocated...???
        // where someone can say yes/no

        // Generate the user ID's of those based on the array keys from above

        foreach ($markers_array as $markers_array) {
            $project_mark_allocation = new ProjectMarkReviewAllocation();

            $project_mark_allocation->project_id = $projectStrategy->id;
            $project_mark_allocation->user_id = $users_array[$markers_array];

            $project_mark_allocation->save();

            // send an email as well to the person
        }

        // need a return statement for success or fail codes???
    }

    public function re_allocate()
    {
    }

    /**
     * Return a collection of users who are working on an individual team project.
     */
    private function team_members($project_id)
    {
        $projects = Project::with('team_members')->whereId($project_id)->get();

        foreach ($projects as $project) {
            foreach ($project->team_members as $user) {
                $user_id_array = [$user->user_id];
            }
        }

        return $user_id_array;
        // to be fair, we could do this via a lovley model??? C.T
    }

    private function markers($project_id)
    {
        $projects = Project::with('mark_allocations')->whereId($project_id)->get();

        foreach ($projects as $project) {
            foreach ($project->mark_allocations as $user) {
                $user_id_array = [$user->user_id];
            }
        }

        return $user_id_array;
        // to be fair, we could do this via a lovley model??? C.T
    }
}
