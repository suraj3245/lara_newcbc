<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'stream',
        'level',
        'specialization',
        'location',
        'college_type',
        'fee_range'
    ];

    // Define the relationship with the Student model (if it exists)
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
