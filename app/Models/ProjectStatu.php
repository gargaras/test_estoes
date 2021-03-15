<?php

namespace App\Models;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStatu extends Model
{
    protected $fillable = [
        'status',
    ];

    public function projects(){
        return $this->hasMany(Project::class, 'fk_idstatus');
    }
}
