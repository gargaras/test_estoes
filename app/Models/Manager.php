<?php

namespace App\Models;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'profile_pic',
    ];

    public function projects(){
        return $this->hasMany(Project::class, 'fk_idproject_manager');
    }
}
