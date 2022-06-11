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
            'method_name'=>$this->faker->randomElement($array = array('credito', 'debito', 'paypal')),
            'available_budget'=>$this->faker->numberBetween($min=0,$max=(2^32)-1),
            'user_id'=>User::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 50)
            //Sujeto a modificaciones, especificar en MR en tal caso
        ];
    }
}
