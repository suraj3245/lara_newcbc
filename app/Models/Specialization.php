<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'course_id', 'description'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
