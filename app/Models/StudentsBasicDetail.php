<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsBasicDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'social_category',
        'dob',
        'gender',
        'marital_status',
        'physically_challenged',
        'bio'
    ];
}
