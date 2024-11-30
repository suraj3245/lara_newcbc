<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCollege extends Model
{
    use HasFactory;

    protected $fillable = [
        'collegeName',
        'contactPersonName',
        'email',
        'phone',
        'address',
        'hearAboutUs',
        'additionalRequests',
    ];
}
