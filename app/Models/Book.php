<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'response_type',
        'q_answer',
        'video_url',
        'day',
        'question_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
