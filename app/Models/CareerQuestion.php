<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerQuestion extends Model
{
    use HasFactory;

    protected $table = 'career_questions';
    protected $fillable = ['question', 'type'];
}
