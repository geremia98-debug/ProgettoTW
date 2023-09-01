<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rentals>
 */
class RentalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_client' => $this->faker->firstName,
            'surname_client' => $this->faker->lastName,
            'plate' => $this->faker->username,
            'start_rent' => $this->faker->dateTimeBetween('-1 year','today'),
            'end_rent' => $this->faker->dateTimeBetween('today','+1 year')
        ];
    }
}
