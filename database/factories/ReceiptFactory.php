<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Payment_method;
use App\Models\User;
use App\Models\Receipt;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receipt>
 */
class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement($array = array ('Pago de membresía.')),
            'sum' => $this->faker->numberBetween($min = 1000, $max = 3000), //Evaluar usar monto fijo
            'payment_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'payment_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'payment_method_id' => Payment_method::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 50)
            //
        ];
    }
}
