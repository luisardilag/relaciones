<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* 
        Método que representa la relación entre "User y Perfil":
        Un Usuario "tiene un solo (hasOne)" Perfil.
    */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


    /* 
        Método que representa la relación entre "User y Level":
        Un Usuario "pertenece a (belongsTo)" un Level.
    */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }


    /* 
        Método que representa la relación entre "User y Group":
        Un Usuario "tiene una relación muchos a muchos (belongsToMany)" con un Group.
    */
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }


    /* 
        Método que representa la relación entre "Usuario y Localización":
        Un Usuario tiene una Localización "a travez de (belongsTo)".
    */
    public function location()
    {
        return $this->hasOneThrough(Location::class, Profile::class);
    }


    /* 
        Método que representa la relación entre "User y Post":
        Un Usuario "tiene muchos (hasMany)" Posts.
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    /* 
        Método que representa la relación entre "User y Post":
        Un Usuario "tiene muchos (hasMany)" Posts.
    */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }


    /* 
        Método que representa la relación entre "User y Post":
        Un Usuario "tiene muchos (hasMany)" Posts.
    */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    /* 
        Método que representa la "relación polimórfica" entre "Usuario e Imágenes":
        Un Usuario va a tener una imagen de perfil
    */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
