<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Role;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'role_name' => $this->faker->randomElement($array = array('admin','usuario','artista')),
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 0)
            //
        ];
    }
}
