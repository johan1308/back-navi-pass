<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Credentials;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Additional_information>
 */
class Additional_informationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'values' => fake()->name(),
            'created_at' => fake()->date(),
            'credential_id' => Credentials::factory(),
        ];
    }
}
