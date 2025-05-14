<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category' => $this->faker->word(),
            'gps_location' => $this->faker->latitude() . ', ' . $this->faker->longitude(),
            'picture' => $this->faker->imageUrl(),
            'date_time' => $this->faker->dateTime(),
            'donate' => $this->faker->boolean(),
            'extra_remarks' => $this->faker->optional()->sentence(),
            'weight' => $this->faker->optional()->randomFloat(2, 0.1, 5.0),
            'measurements' => $this->faker->optional()->randomElement(['10x5x3', '4x4x4', '2x2x2']),
            'material' => $this->faker->optional()->word(),
            'timeperiod' => $this->faker->optional()->randomElement(['Romeins', 'Middeleeuwen', 'IJzertijd']),
        ];
    }
}
