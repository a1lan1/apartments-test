<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(20),
            'price' => $this->faker->numberBetween(100, 1000) * 1000,
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 5),
            'storeys' => $this->faker->numberBetween(1, 5),
            'garages' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->paragraph(),
        ];
    }
}
