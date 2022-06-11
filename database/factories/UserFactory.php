<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
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
            'password' => $this->faker->password,//'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email' => $this->faker->unique()->safeEmail(),
            'biography' => $this->faker->text(),
            'signup_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'birth_date' => $this->faker->dateTimeBetween($startDate = '-100 years', $endDate = 'now', $timezone = null),
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 50)
             

            // no sé si va lo del email verifed y remember token
            // 'email_verified_at' => now(),
            // 'remember_token' => Str::random(10),
            // Es parte de lo que crea Laravel por defecto, que se quede por mientras
            // Y si falla, pa fuera noma, como ella XDD
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
