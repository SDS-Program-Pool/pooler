<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class Project extends Model
{
    use HasFactory;
    use HasStatuses;

    public $incrementing = false;

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
        return $this->hasOne(ProjectSource::class, 'project_id');
    }

    public function team_members()
    {
        return $this->hasManyThrough(ProjectTeamMember::class, ProjectTeam::class);
    }

    public function mark_allocations()
    {
        return $this->hasMany(ProjectMarkAllocation::class);
    }

    public function mark_review_allocations()
    {
        return $this->hasMany(ProjectMarkAllocation::class);
    }

    public function marks()
    {
        return $this->hasMany(ProjectMark::class, 'project_id');
    }

    public function mark_review()
    {
        return $this->hasMany(ProjectMarkReview::class, 'project_id');
    }

    public function mark_review_marks()
    {
        return $this->hasManyThrough(ProjectMarkReviewMark::class, ProjectMarkReview::class);
    }

    public function getProjectTeamMembersAttribute()
    {
        foreach ($this->team_members as $team_member) {
            $array[] = $team_member->user_id;
        }

        return $array;
    }
}
