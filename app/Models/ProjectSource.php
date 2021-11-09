<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class ProjectSource extends Model
{
    use Uuids; use HasFactory;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
