<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'section', 'year'];

    public function grade(): HasMany{
        return $this->hasMany(Grade::class);
    }
}
