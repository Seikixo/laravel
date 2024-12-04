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

    public function scopeUpdateGrades($query, $grades){
        foreach($grades as $gradeId => $gradeData){
            $this->grades()->where('id', $gradeId)->update($gradeData);
        }
    }

    public function scopeAddGrades($query, array $grades){
        $this->grades()->create($grades);
    }
}
