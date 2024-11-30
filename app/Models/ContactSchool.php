<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSchool extends Model
{
    use HasFactory;
    protected $fillable = [
        'schoolName',
        'contactPersonName',
        'email',
        'phone',
        'address',
        'interests',
        'hearAboutUs',
        'additionalRequests',
    ];
}
