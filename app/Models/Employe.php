<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
class Employe extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'profile_pic',
    ];

    public function projects(){
        return $this->hasMany(Project::class, 'fk_idassigned_to');
    }
}
