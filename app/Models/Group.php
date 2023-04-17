<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /* 
        Método que representa la relación que pertenece a.
        Un Grupo puede tener muchos Users
    */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
