<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(GenreSeeder::class);
        $this->call(RoleSeeder::class);
        \App\Models\Location::factory(10)->create();
        \App\Models\User::factory(10)->create();
        //\App\Models\Genre::factory(10)->create();
        \App\Models\Payment_method::factory(10)->create();
        \App\Models\Receipt::factory(10)->create();
        \App\Models\Album::factory(10)->create(); 
        \App\Models\Playlist::factory(10)->create();
        \App\Models\Song::factory(150)->create();
        \App\Models\Song_playlist::factory(10)->create();
        \App\Models\Like::factory(10)->create();
        \App\Models\Rate::factory(10)->create();
        \App\Models\Song_genre::factory(10)->create();
        \App\Models\Follow::factory(10)->create();
    }
}
