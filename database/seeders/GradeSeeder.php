<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\Student;

class GradeSeeder extends Seeder
{

    public function run(): void
    {
        $students = Student::orderBy('id')->get();

        foreach($students as $student){
            Grade::factory()->create([
                'student_id' => $student->id,
            ]);
        }
    }
}
