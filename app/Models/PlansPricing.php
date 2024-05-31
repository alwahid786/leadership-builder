<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stripe\Stripe;
use Stripe\Product;
use Stripe\Price;
use App\Models\Invoices;

class PlansPricing extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'price',
        'details',
        'slug',
        'duration',
        'stripe_plan',
        'stripe_price_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($plan) {
            $plan->createStripeProductAndPrice();
        });

        static::updated(function ($plan) {
            $plan->updateStripeProductAndPrice();
        });

        static::deleting(function ($plan) {
            $plan->deleteStripeProductAndPrice();
        });
    }

    public function createStripeProductAndPrice()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // Create the product in Stripe
        $product = Product::create([
            'name' => $this->name,
            'description' => $this->details,
        ]);

        // Create the price in Stripe
        $price = Price::create([
            'product' => $product->id,
            'unit_amount' => $this->price * 100,
            'currency' => 'usd',
            'recurring' => [
                'interval' => $this->duration, // or 'year', 'week', etc.
            ],
        ]);

        // dd($product->id, $price->id);

        // Update the local plan with the Stripe product and price IDs
        // $this->update([
        //     'stripe_plan' => $product->id,
        //     'stripe_price_id' => $price->id,
        // ]);
        
        $this->stripe_plan = $product->id;
        $this->stripe_price_id = $price->id;
        $this->saveQuietly();
    }

    public function updateStripeProductAndPrice()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // Update the product in Stripe
        $product = Product::retrieve($this->stripe_plan);
        $product->name = $this->name;
        $product->description = $this->details;
        $product->save();

        // Check if the price has changed
        if ($this->isDirty('price')) {
            // Create a new price in Stripe
            $price = Price::create([
                'product' => $product->id,
                'unit_amount' => $this->price * 100,
                'currency' => 'usd',
                'recurring' => [
                    'interval' => $this->duration, // or 'year', 'week', etc.
                ],
            ]);

            $this->stripe_price_id = $price->id;
            $this->saveQuietly();
        }
    }

    public function deleteStripeProductAndPrice()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // Delete the product in Stripe
        $product = Product::retrieve($this->stripe_product_id);
        $product->delete();
    }

    public function invoices()
    {
        return $this->hasMany(Invoices::class);
    }
}
