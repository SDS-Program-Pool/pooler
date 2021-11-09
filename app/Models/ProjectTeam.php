<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class ProjectTeam extends Model
{
    use Uuids; use HasFactory;

    public function projects()
    {
        return $this->BelongsTo(Project::class);
    }

    public function members()
    {
        return $this->hasMany(ProjectTeamMember::class);
    }
}
