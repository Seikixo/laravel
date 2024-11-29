<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $student = Student::factory()->create();

        return [
            'student_id' => $student->id,
            'subject' => $this->faker->randomElement(['English', 'Math', 'Science', 'History']),
            'grades' => $this->faker->numberBetween(50, 100)
        ];
    }
}
