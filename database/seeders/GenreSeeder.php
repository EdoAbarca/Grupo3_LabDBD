<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre = new Genre();
        $genre->id = 0;
        $genre->genre_name = "reggaeton"; 
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 1;
        $genre->genre_name = "pop"; //Administrador
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 2;
        $genre->genre_name = "rap"; //Administrador
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 3;
        $genre->genre_name = "rock"; //Administrador
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 4;
        $genre->genre_name = "metal"; //Administrador
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 5;
        $genre->genre_name = "eurodance"; //Administrador
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 6;
        $genre->genre_name = "disco"; //Administrador
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 7;
        $genre->genre_name = "jazz"; //Administrador
        $genre->delete = false;
        $genre->save();

    }
}
