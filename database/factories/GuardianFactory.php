<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
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
            'job' => fake()->randomElement([
                'Guru', 'Dokter', 'Programmer', 'Petani', 'Perawat',
                'Animator', 'Pemandu Wisata', 'Desainer Grafis', 'Pelukis', 'Chef'
        ]),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
        ];
    }
}