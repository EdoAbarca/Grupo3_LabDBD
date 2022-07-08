<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Playlist;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'playlist_name' => $this->faker->lastname(),
            'duration' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'songs_quantity' => $this->faker->numberBetween($min=1,$max=1000),
            'description' => $this->faker->text($maxNbChars = 200),
            'creation_date' => $this->faker->dateTime(),
            'user_id' => User::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 0)
        ];
    }
}
