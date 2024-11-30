<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_full_name', 'college_short_name', 'type',
        'approved_by', 'established_year', 'about',
        'address', 'phone', 'email', 'website', 'city'
    ];
}
