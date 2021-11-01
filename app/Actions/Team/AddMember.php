<?php

namespace App\Actions\Team;

use Illuminate\Http\Request;

class AddMember
{
    public function create()
    {

        // Add a team member
        // add record to DB
        // Verify email if the current user is not equal to the user being added

        $team = new Team;

        $team->user_id = Auth::id();
        $team->project_id = $project->id;
        $team->isOwner = TRUE;

        $team->save();

        dd("Hello add member");
        return "Hello";
    }

}
