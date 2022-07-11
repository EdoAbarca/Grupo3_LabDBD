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
        $this->call(RoleSeeder::class);
        $this->call(GenreSeeder::class);
        \App\Models\Location::factory(20)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Payment_method::factory(20)->create();
        \App\Models\Receipt::factory(20)->create();
        \App\Models\Album::factory(20)->create(); 
        \App\Models\Playlist::factory(20)->create();
        \App\Models\Song::factory(150)->create();
        \App\Models\Song_playlist::factory(20)->create();
        \App\Models\Like::factory(20)->create();
        \App\Models\Rate::factory(20)->create();
        \App\Models\Song_genre::factory(150)->create();
        \App\Models\Follow::factory(20)->create();
    }
}
