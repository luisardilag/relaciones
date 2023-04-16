<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    /* 
        Método que representa la relación polimórfica.
        morphTo: significa "transforma a" pero queda abierta ya que se usa en "Comentarios, Videos y Posts".
    */
    public function commentable()
    {
        return $this->morphTo();
    }


    /* 
        Método que representa la relación entre "Comment y User":
        Un Post "pertenece (belongsTo)" a un User.
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
