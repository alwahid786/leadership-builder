<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'day', // Add 'day' attribute here
        // Add other attributes that are mass assignable
        'author',
        'quotation',
        'question',
    ];
}
