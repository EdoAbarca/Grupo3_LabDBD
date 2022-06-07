<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song;
use App\Models\Album;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'song_name' => $this->faker->name(),
            'duration' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'stream' => $this->faker->numberBetween($min=1,$max=1000000),
            'release_date' => $this->faker->dateTime(),
            'parental_advisory' => $this->faker->boolean(),
            'rate' => $this->faker->numberBetween($min=1,$max=100),
            'album_id' =>Album::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 50)
        ];
    }
}
