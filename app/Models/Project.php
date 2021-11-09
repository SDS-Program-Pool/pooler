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
}
