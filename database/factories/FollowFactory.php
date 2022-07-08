<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Follow;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follow>
 */
class FollowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id1' =>User::all()->random()->id, //Usuario seguidor
            'user_id2' =>User::all()->random()->id, //Usuario seguido
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 0)
        ];
    }
}
