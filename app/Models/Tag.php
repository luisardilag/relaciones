<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

        /* 
            Método que representa la "relación polimórfica correspondiente" entre "Tag e Imágenes":
            morphedByMany: significa transformado para muchos.
        */
        public function posts()
        {
            return $this->morphedByMany(Post::class, 'taggable');
        }


        public function videos()
        {
            return $this->morphedByMany(Video::class, 'taggable');
        }
}
