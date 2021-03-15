<?php

namespace App\Models;
use App\Models\Manager;
use App\Models\Employe;
use App\Models\ProjectStatu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_info',
        'description',
        'fk_idproject_manager',
        'fk_idassigned_to',
        'fk_idstatus',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $dates = [
        'created_at'
    ];

    public function manager(){
        return $this->belongsTo(Manager::class, 'fk_idproject_manager');
    }

    public function employe(){
        return $this->belongsTo(Employe::class, 'fk_idassigned_to');
    }

    public function status(){
        return $this->belongsTo(ProyectStatu::class, 'fk_idstatus');
    }
}
