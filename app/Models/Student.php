<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'section', 'year', ];

    public function grades(): HasMany{
        return $this->hasMany(Grade::class);
    }

    public function scopeWithAvgGrade($query){
        return $query->selectRaw('students.*,
        ROUND((avg(grades.english) + avg(grades.math) + avg(grades.science) + avg(grades.history)) / 4, 2)
        as grades_avg_grade')
        ->leftJoin('grades', 'students.id', '=', 'grades.student_id')
        ->groupBy('students.id', 'students.name', 'students.section', 'students.year', 'students.created_at', 'students.updated_at');
    }

    public function scopeUpdateGrades($query, $grades){
        foreach($grades as $gradeId => $gradeData){
            $this->grades()->where('id', $gradeId)->update($gradeData);
        }
    }

    public function scopeAddGrades($query, array $grades){
        foreach ($grades as $gradesData) {
            $this->grades()->create($gradesData);
        }
    }

    public function scopeFilterBySection($query, $section){
        return $query->when($section, fn($query) => $query->where('section', $section));
    }

    public function scopeSearch($query, $term){
        if($term){
            $query->where('name', 'like', "%{$term}%")
            ->orWhere('section', 'like', "%{$term}%")
            ->orWhere('year', 'like', "%{$term}%");
        }
    }
}
