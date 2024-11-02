<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StackOfProject extends Model
{
    use HasFactory;

    public function techStack()
    {
        return $this->belongsTo(TechStack::class, 'tech_stack_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
