<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerCombinationLetter extends Model
{
    use HasFactory;
    protected $fillable = ['unique_letter', 'similar_letters'];
}
