<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'level_id', 'stream_id', 'description', 'duration'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function specializations()
    {
        return $this->hasMany(Specialization::class);
    }
}
