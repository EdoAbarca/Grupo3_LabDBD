<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song_genre;
use App\Models\Song;
use App\Models\Genre;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song_genre>
 */
class Song_genreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'genre_id' =>Genre::all()->random()->id,
            'song_id' =>Song::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 50)
        ];
    }
}
