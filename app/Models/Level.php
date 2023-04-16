<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    /* 
        Método que representa la relación entre "Level y User":
        Un Level "tiene muchos (hasMany)" Usuarios.
    */
    public function users()
    {
        return $this->hasMany(User::class);
    }


    /* 
        Método que representa la relación entre "Level y Post":
        Un Level tiene muchos Posts "a travez de (belongsTo)" Usuarios.
    */
    public function posts()
    {
        return $this->hasManyThrough(Post::class, User::class);
    }
}
