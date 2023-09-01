<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           /* 'plate' => function () {
            
                $faker = Faker\Factory::create('it_IT'); // Imposta la lingua italiana per Faker

                // Genera due lettere casuali (AA)
                $lettere = strtoupper($faker->randomLetter() . $faker->randomLetter());
            
                // Genera tre cifre casuali (123)
                $numeri = $faker->numberBetween(000, 999);
            
                // Genera due lettere casuali (BB)
                $lettere2 = strtoupper($faker->randomLetter() . $faker->randomLetter());
            
                // Combina le componenti per formare la targa
                $targa = $lettere . $numeri . $lettere2;
            
                return $targa;
            }, */

            'plate' => $this->faker->username,

            'brand' => $this->faker->text(20),
            'model' => $this->faker->text(20),
            'displacement' => $this->faker->numberBetween(5, 80) * 100,
            'price' => $this->faker->numberBetween(5, 25) * 100,
            'seats' => $this->faker->randomDigit,
            'description' => $this->faker->paragraph(5)
        ];
    }
}
