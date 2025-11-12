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
        //     'grade' => fake()->randomElement([
        //     '11 PPLG 1', '11 PPLG 2',
        //     '11 Animasi 1', '11 Animasi 2', '11 Animasi 3', '11 Animasi 4', '11 Animasi 5',
        //     '11 DKV 1', '11 DKV 2', '11 DKV 3', '11 DKV 4', '11 DKV 5',
        // ]),
        'classroom_id' => Classroom::factory(), // Relasi ke Classroom
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
        ];
    }
}