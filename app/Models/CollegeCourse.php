<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_id',
        'course_id',
        'fee',
        'description'
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
