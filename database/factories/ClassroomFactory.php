<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

class ClassroomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                '10 PPLG 1',
                '10 PPLG 2',
                '11 PPLG 1',
                '11 PPLG 2',
            ]),
        ];
    }

    public function withStudents($count = 5)
    {
        return $this->afterCreating(function ($classroom) use ($count) {
            Student::factory($count)->create([
                'classroom_id' => $classroom->id,
            ]);
        });
    }
}

