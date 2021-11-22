<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuids;

class Project extends Model
{
    use Uuids; use HasFactory; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->hasOne(ProjectTeam::class);
    }
    public function source()
    {
        return $this->hasOne(ProjectSource::class,'project_id');
    }

    public function team_members()
    {
        return $this->hasManyThrough(ProjectTeamMember::class, ProjectTeam::class);
    }

    public function mark_allocations()
    {
        return $this->hasMany(ProjectMarkAllocation::class);
      
    }
}
