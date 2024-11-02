<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function stacksUsed()
    {
        return $this->hasMany(StackOfProject::class, 'project_id', 'id');
    }
}
