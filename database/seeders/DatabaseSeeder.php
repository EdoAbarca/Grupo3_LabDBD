<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Album;
use App\Models\Follow;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Location;
use App\Models\Payment_method;
use App\Models\Permission;
use App\Models\Playlist;
use App\Models\Rate;
use App\Models\Receipt;
use App\Models\Role_permission;
use App\Models\Role;
use App\Models\Song_genre;
use App\Models\Song_playlist;
use App\Models\Song;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory(10)->create();
        \App\Models\Location::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Permission::factory(10)->create();
        \App\Models\Genre::factory(10)->create();
        \App\Models\Payment_method::factory(10)->create();
        \App\Models\Receipt::factory(10)->create();
        \App\Models\Album::factory(10)->create(); 
        \App\Models\Playlist::factory(10)->create();
        \App\Models\Song::factory(10)->create();
        \App\Models\Song_playlist::factory(10)->create();
        \App\Models\Like::factory(10)->create();
        \App\Models\Rate::factory(10)->create();
        \App\Models\Song_genre::factory(10)->create();
        \App\Models\Follow::factory(10)->create();
        \App\Models\Role_permission::factory(10)->create();
    }
}
