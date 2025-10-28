<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TripBooking>
 */
class TripBookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'challan_bill' => $this->faker->word(),
            'load_date' => $this->faker->date(),
            'unload_date' => $this->faker->date(),
            'load_type' => json_encode([$this->faker->word(), $this->faker->word()]),
            'unload_type' => json_encode([$this->faker->word(), $this->faker->word()]),
            'about_good' => $this->faker->word(),
            'quantity' => $this->faker->randomNumber(),
            'vehicle_no' => $this->faker->bothify('??-####-??'),
            'vehicle_select' => $this->faker->word(),
            'driver_select' => $this->faker->word(),
            'helper_select' => $this->faker->word(),
            'vehicle_type' => $this->faker->word(),
            'vehicle_size' => $this->faker->word(),
            'duty' => $this->faker->word(),
            'client_name' => $this->faker->company(),
            'department' => $this->faker->word(),
            'note' => $this->faker->sentence(),
        ];
    }
}
