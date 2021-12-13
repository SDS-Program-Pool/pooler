<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMarkReviewMark extends Model
{
    use HasFactory;

    public function project_mark_review()
    {
        return $this->belongsTo(ProjectMarkReview::class);
    }

}
