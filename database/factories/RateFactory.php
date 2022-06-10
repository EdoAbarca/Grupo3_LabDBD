<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rate;
use App\Models\User;
use App\Models\Song;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'score'=>$this->faker->numberBetween($min=0,$max=100),
            'user_id' =>User::all()->random()->id,
            'song_id' =>Song::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 50)
        ];
    }
}
