<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
    'name' => fake()->name(),
    'birth_date' => fake()->date(), 
    'classroom_id' => ClassRoom::factory(),
    'email' => fake()->unique()->safeEmail(),
    'address' => fake()->address(), 
 ];

    }
}
