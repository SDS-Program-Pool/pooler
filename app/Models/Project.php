<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use HasStatuses;
    use SoftDeletes;

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
        return $this->hasMany(ProjectMarkReviewAllocation::class);
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

    public function getTypeAttribute()
    {
        if ($this->is_team_individual === 1) {
            return 'Individual Project';
        } elseif ($this->is_team === 1) {
            return 'Team Project';
        } elseif ($this->is_team_feature_branch === 1) {
            return 'Feature Branch Project';
        } else {
            return null;
        }
    }
}
