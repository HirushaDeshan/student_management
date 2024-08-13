<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'instructorId',
        'title',
        'category',
        'description',
        'isActive',
    ];

    public function lessons(): HasOne
    {
        return $this->hasOne(Lessons::class, 'courseId', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'instructorId', 'id');
    }
}
