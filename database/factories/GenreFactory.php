<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'genre_name' => $this->faker->randomElement($array = array ('reggaeton','pop','rap','rock','metal','eurodance','disco','jazz')),
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 50)
        ];
    }
}
