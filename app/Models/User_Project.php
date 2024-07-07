<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Project extends Model
{
    use HasFactory;
    protected $table = 'user_projects';
    protected $fillable = [
        'project_id',
        'user_id',
        'role',
    ];
    public function project(){
        return $this->belongsToMany(Projects::class);
        
    }
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
