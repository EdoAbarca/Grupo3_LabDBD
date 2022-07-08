<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song_playlist;
use App\Models\Song;
use App\Models\Playlist;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song_playlist>
 */
class Song_playlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'playlist_id' =>Playlist::all()->random()->id,
            'song_id' =>Song::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 0)
        ];
    }
}
