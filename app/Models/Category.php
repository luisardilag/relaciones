<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /* 
        Método que representa la relación entre "Category y Post":
        Una Category "tiene muchos (hasMany)" Posts.
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /* 
        Método que representa la relación entre "Category y Video":
        Una Category "tiene muchos (hasMany)" Videos.
    */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
