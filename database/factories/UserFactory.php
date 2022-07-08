<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use App\Models\Location;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nickname' => $this->faker->name(),
            'password' => $this->faker->password,
            'email' => $this->faker->unique()->safeEmail(),
            'biography' => $this->faker->text(),
            'signup_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'birth_date' => $this->faker->dateTimeBetween($startDate = '-100 years', $endDate = 'now', $timezone = null),
            'role_id' => Role::all()->random()->id,
            'location_id' => Location::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 0)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
