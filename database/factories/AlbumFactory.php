<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Album;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'album_name' => $this->faker->name(),
            'release_date' => $this->faker->dateTime(),
            'songs_quantity' => $this->faker->numberBetween($min=1,$max=25),
            'duration' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'user_id' =>User::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 50)
        ];
    }
}
