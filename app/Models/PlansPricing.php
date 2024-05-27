<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlansPricing extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'price',
        'details',
        'slug',
        'stripe_plan'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
