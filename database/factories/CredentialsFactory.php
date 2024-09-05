<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\SubCategories;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Credentials>
 */
class CredentialsFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->email(),
            'password' => static::$password ??= Hash::make('password'),
            'sub_category_id' => SubCategories::factory(),
        ];
    }
}
