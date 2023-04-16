<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

        /* 
            Método que representa la relación entre "Post y User":
            Un Post "pertenece (belongsTo)" a un User.
        */
        public function user()
        {
            return $this->belongsTo(Post::class);
        }


        /* 
            Método que representa la relación entre "Post y Category":
            Un Post "pertenece (belongsTo)" a una Category.
        */
        public function category()
        {
            return $this->belongsTo(Category::class);
        }


        /* 
            Método que representa la "relación polimórfica" entre "Post y Comentarios":
            Nota: Se escribe en la declaración de la función en "plural"
                  El método polimórfico es commentable, definido en la migración "comments-table".
            Un Post se relaciona con muchos Comment a travez de el campo "commentable".
        */
        public function comments()
        {
            return $this->morphMany(Comment::class, 'commentable');
        }


        /* 
            Método que representa la "relación polimórfica" entre "Post e Imágenes":
        */
        public function image()
        {
            return $this->morphOne(Image::class, 'imageable');
        }

        
        /* 
            Método que representa la "relación polimórfica" entre "Post e Imágenes":
        */
        public function tags()
        {
            return $this->morphToMany(Tag::class, 'taggable');
        }
}
