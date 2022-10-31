<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Strings;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Geladeira', 'Lavadora de Roupas','Lavadora de louças','Televisão','Ar Condicionado']),
            'description' => $this->faker->text(100),
            'tension' => $this->faker->randomElement(['110v', '220v']),
            'brand' => $this->faker->randomElement(['Brastemp', 'Samsung','LG','Electrolux','Consul']),
            'image' => $this->faker->imageUrl(),
        ];
    }
}