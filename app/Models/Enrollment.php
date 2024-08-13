<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enrollment extends Model
{
    use HasFactory;


    protected $fillable = [
        'courseId',
        'studentId',
        'isActive',
    ];

    // public function course() :HasMany
    // {
    //     return $this->hasMany(Course::class, 'studentId', 'id');
    // }
}
