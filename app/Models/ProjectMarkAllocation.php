<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMarkAllocation extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        //return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
