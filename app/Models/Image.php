<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /* 
        Método que representa la relación polimórfica.
        morphTo: significa "transforma a" pero queda abierta ya que se usa en "Comentarios, Videos y Posts".
    */
    public function imageable()
    {
        return $this->morphTo();
    }
}
