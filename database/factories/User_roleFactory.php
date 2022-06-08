<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User_role;
use App\Models\Role;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_role>
 */
class User_roleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' =>User::all()->random()->id,
            'role_id' =>Role::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 50)
        ];
    }
}
