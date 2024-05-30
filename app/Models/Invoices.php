<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'invoice_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            do {
                $randomCode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            } while (self::where('invoice_id', $randomCode)->exists());

            $invoice->invoice_id = $randomCode;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function plan()
    {
        return $this->belongsTo(PlansPricing::class, 'plan_id');
    }
}
