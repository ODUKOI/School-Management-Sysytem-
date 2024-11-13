<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'subject_id'];

    // Relationship with Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relationship with Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }



}
