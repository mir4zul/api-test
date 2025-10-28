<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClintBill>
 */
class ClientBillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_bill' => $this->faker->unique()->numerify('CLT-####'),
            'client_bill_date' => $this->faker->date(),
            'fuel_type' => $this->faker->randomElement(['diesel', 'petrol']),
            'fuel_cost' => $this->faker->randomFloat(2, 100, 1000),
            'note' => $this->faker->sentence(),
        ];
    }
}
