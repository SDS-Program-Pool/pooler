<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMarkReview extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function project_mark_review_marks()
    {
        return $this->hasMany(ProjectMarkReviewMark::class);
    }

    public function project_marks()
    {
        return $this->belongsTo(ProjectMark::class);
    }
}
