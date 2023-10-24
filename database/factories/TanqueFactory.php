<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fazenda;

class TanqueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fazenda_id' => function () {
				return Fazenda::all()->random()->id;
			},
            'nome' => $this->faker->name,
            'capacidade' => $this->faker->randomNumber(2),
            'observacoes' => $this->faker->text,
        ];
    }
}