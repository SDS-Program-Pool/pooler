<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class ProjectTeamMember extends Model
{
    use Uuids; use HasFactory;

    public function team()
    {
        return $this->belongsTo(ProjectTeam::class);
    }



}
