<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

        /* 
            Método que representa la relación entre "Post y User":
            Un Post "pertenece (belongsTo)" a un User
        */
        public function user()
        {
            return $this->belongsTo(Post::class);
        }
}