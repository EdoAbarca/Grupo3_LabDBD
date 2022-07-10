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
        $genre->id = 1;
        $genre->genre_name = "pop";
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 2;
        $genre->genre_name = "rap";
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 3;
        $genre->genre_name = "rock";
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 4;
        $genre->genre_name = "metal";
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 5;
        $genre->genre_name = "eurodance";
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 6;
        $genre->genre_name = "disco"; 
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 7;
        $genre->genre_name = "jazz"; 
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 8;
        $genre->genre_name = "eurobeat"; 
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 9;
        $genre->genre_name = "reggae"; 
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 10;
        $genre->genre_name = "funk"; 
        $genre->delete = false;
        $genre->save();

        $genre = new Genre();
        $genre->id = 11;
        $genre->genre_name = "reggaeton"; 
        $genre->delete = false;
        $genre->save();
        
        $genre = new Genre();
        $genre->id = 12;
        $genre->genre_name = "trap"; 
        $genre->delete = false;
        $genre->save();
    }
}
