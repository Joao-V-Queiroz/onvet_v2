<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FazendaFactory extends Factory
{
    public function definition(): array
    {
        return [
           "nome" => $this->faker->name,
           "cep" => $this->faker->postcode,
           "uf" => $this->faker->stateAbbr,
           "logradouro" => $this->faker->streetName,
           "bairro" => $this->faker->streetSuffix,
           "cidade" => $this->faker->city,
           "numero" => $this->faker->buildingNumber,
           "complemento" => $this->faker->secondaryAddress,
           "status" => "Ativo",
        ];
    }
}
