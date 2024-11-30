<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsContactDetail extends Model
{
    use HasFactory;

    protected $table = 'students_contact_details';

    // Fillable fields
    protected $fillable = [
        'student_id',
        'address',
        'state',
        'city',
        'zip_code'
    ];

    // Relationship with Student model
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
