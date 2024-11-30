<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Foundation\Auth\User as Authenticatable;

class school extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;

    protected $primaryKey = 'School_id';
    protected $fillable = [
        'School_name', 'School_email', 'School_password', 'from', 'School_mobile', 'api_token', 'board', 'address', 'state', 'city'
    ];
}
