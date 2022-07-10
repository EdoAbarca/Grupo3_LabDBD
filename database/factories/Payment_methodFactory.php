<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment_method;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment_method>
 */
class Payment_methodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'method_name'=>$this->faker->randomElement($array = array('Credito', 'Debito', 'PayPal')),
            'pmp'=> $this->faker->password,
            'available_budget'=>$this->faker->numberBetween($min=0),
            'user_id'=>User::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 0)
        ];
    }
}
