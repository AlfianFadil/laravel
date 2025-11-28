<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                '10 PPLG 1',
                '10 PPLG 2',
                '11 PPLG 1',
                '11 PPLG 2'
            ]),
        ];
    }

    /**
     * Tambah relasi siswa otomatis saat classroom dibuat
     */
    public function withStudents($count = 3)
    {
        return $this->afterCreating(function ($classroom) use ($count) {
            Student::factory($count)->create([
                'classroom_id' => $classroom->id
            ]);
        });
    }
}
