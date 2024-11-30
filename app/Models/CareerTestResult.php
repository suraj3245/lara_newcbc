<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerTestResult extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural of the model name
    protected $table = 'career_test_results';

    // Mass assignable attributes
    protected $fillable = [
        'user_id', 'realistic_score', 'investigative_score', 'artistic_score',
        'social_score', 'enterprising_score', 'conventional_score'
    ];

    // User relationship (assuming a 'User' model representing 'students' table)
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id');
    }
}
