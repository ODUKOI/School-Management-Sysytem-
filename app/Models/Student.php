<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'admission_id',
        'name',
        'index_number',
        'date_of_birth',
        'gender',
        'section',
        'level',
        'upload',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'enrollments');
    }

}
