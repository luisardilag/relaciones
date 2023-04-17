<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /* Creación de 3 Grupos */
        \App\Models\Group::factory(3)->create();


        /* Creación de 3 Niveles */
        \App\Models\Level::factory()->create(['name' => 'Oro']);
        \App\Models\Level::factory()->create(['name' => 'Plata']);
        \App\Models\Level::factory()->create(['name' => 'Bronce']);


        /* Creación de 3 Usuarios */
        \App\Models\User::factory(5)->create()->each(
            function ($user) {

                /* Creamos un Perfil */
                $profile = $user->profile()->save(\App\Models\Profile::factory()->make());

                /* Creamos una Localización */
                $profile->location()->save(\App\Models\Location::factory()->make());

                /* Atamos ese Usuario a varios Grupos */
                $user->groups()->attach($this->array(rand(1, 3)));

                /* Creamos su imagen de Perfil */
                $user->image()->save(\App\Models\Image::factory()->make([
                    'url' => 'https://lorempixel.com/90/90/'
                ]));
            }
        );



        /* Creación de Categorias y Tags */
        \App\Models\Category::factory(4)->create();
        \App\Models\Tag::factory(12);


        /* Creación de Posts */
        \App\Models\Post::factory(40)->create()->each(function ($post) {

            /* Creamos una Imagen */
            $post->image()->save(\App\Models\Image::factory()->make());

            /* Creamos una Tags */
            $post->tags()->attach($this->array(rand(1, 12)));

            /* Creamos Comentarios */
            $numbers_comments = rand(1, 6);

            for ($i = 1; $i < $numbers_comments; $i++) {
                $post->comments()->save(\App\Models\Comment::factory()->make());
            }
        });


        /* Creación de Videos */
        \App\Models\Video::factory(40)->create()->each(function ($video) {

            /* Creamos una Imagen */
            $video->image()->save(\App\Models\Image::factory()->make());

            /* Creamos una Tags */
            $video->tags()->attach($this->array(rand(1, 12)));

            /* Creamos Comentarios */
            $numbers_comments = rand(1, 6);

            for ($i = 1; $i < $numbers_comments; $i++) {
                $video->comments()->save(\App\Models\Comment::factory()->make());
            }
        });
    }

    
    public function array($max)
    {
        $values = [];

        for ($i = 1; $i < $max; $i++) {
            $values[] = $i;
        }

        return $values;
    }
}
