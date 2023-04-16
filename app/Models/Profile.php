<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /* 
        Método que representa la relación entre "Profile y Location":
        Un Perfil "tiene un solo (hasOne)" Location.
    */
    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
