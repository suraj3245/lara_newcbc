<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        '10th_certificate',
        '12th_certificate',
        'aadhar_card',
    ];
}
