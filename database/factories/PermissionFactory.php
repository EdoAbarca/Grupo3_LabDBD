<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Permission;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomElement($array = array('ADM','USR','ART')),
            'description' => $this->faker->text(),
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 50)
        ];
    }
}
