<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\zoo>
 */
class ZooFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'     => $this->faker->company(),     // example zoo name
            'size'     => $this->faker->numberBetween(1, 500), // size in acres or similar
            'location' => $this->faker->city(),
        ];
    }
}
