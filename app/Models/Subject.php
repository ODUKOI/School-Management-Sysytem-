<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'description',
        'category', // e.g., 'Compulsory' or 'Elective'
        'level', // e.g., 'O-Level', 'A-Level'
        'credits', // credits for the subject if applicable
    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'enrollments', 'student_id', 'subject_id');
    }
}
