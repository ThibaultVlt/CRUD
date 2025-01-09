<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MembresFactory extends Factory
{
    protected $model = \App\Models\Membres::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
        ];
    }
}
