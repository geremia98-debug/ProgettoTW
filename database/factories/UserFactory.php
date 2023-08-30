<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        return [
            'username' => $this->faker->username,
            'password' =>$this->faker->password,
            'remember_token' => Str::random(10),
            'firstname'=> $this->faker->firstName,
            'lastname'=> $this->faker->lastName,
            'residence'=> $this->faker->city,
            'birthdate'=> $this->faker->dateTimeBetween('-70 years','-18 years'),
            'job'=> $this->faker->randomElement(['Cassiere di supermercato','Infermiere ospedaliero','Muratore edile','Insegnante elementare','Cuoco ristorante','Camionista','Segretario amministrativo','Addetto alle risorse umane','Elettricista','Commesso di negozio','Disoccupato','Altro'])

        ];
    }

}
