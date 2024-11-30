<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEducation extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'school_name_x',
        'board_x',
        'stream_x',
        'passing_year_x',
        'percentage_x',
        'school_name_xii',
        'board_xii',
        'stream_xii',
        'passing_year_xii',
        'percentage_xii',
        'college_name',
        'university_name',
        'degree',
        'passing_year_college',
        'percentage_college'
    ];

    // Define the relationship with the Student model (if it exists)
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
