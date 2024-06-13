<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Invoice;
use App\Models\User;
use App\Models\PlansPricing;
use App\Models\Invoices;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class StripeWebhookController extends CashierController
{
    /**
     * Handle Stripe webhook call.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();

        // Log the webhook payload for debugging
        Log::info('Stripe Webhook received:', ['payload' => $payload]);

        // Validate the payload
        if (!isset($payload['type']) || !isset($payload['data']['object'])) {
            return response()->json(['status' => 'invalid payload'], 400);
        }

        // Handle the event
        switch ($payload['type']) {
            case 'invoice.payment_succeeded':
                return $this->handleInvoicePaymentSucceeded($payload['data']['object']);
        }

        return response()->json(['status' => 'event type not handled'], 400);
    }

    protected function handleInvoicePaymentSucceeded($invoice)
    {
        // Validate invoice data
        if (!isset($invoice['customer']) || !isset($invoice['subscription']) || !isset($invoice['lines']['data'][0]['period']['end']) || !isset($invoice['lines']['data'][0]['plan']['id'])) {
            return response()->json(['status' => 'invalid invoice data'], 400);
        }

        $user = User::where('stripe_id', $invoice['customer'])->first();
        if (!$user) {
            return response()->json(['status' => 'user not found'], 404);
        }

        $plan_id = $invoice['lines']['data'][0]['plan']['id'];
        $plan = PlansPricing::where('stripe_price_id', $plan_id)->first();
        if (!$plan) {
            return response()->json(['status' => 'plan not found'], 404);
        }

        $endDate = date('Y-m-d H:i:s', $invoice['lines']['data'][0]['period']['end']);

        // Update user plan
        $user->plan_id = $plan->id;
        $user->save();

        // Update or create subscription
        $dbSubscription = DB::table('subscriptions')->where('stripe_id', $invoice['subscription'])->first();
        if ($dbSubscription) {
            DB::table('subscriptions')->where('stripe_id', $invoice['subscription'])->update([
                'stripe_price' => $plan_id,
                'ends_at' => $endDate,
            ]);
        } else {
            DB::table('subscriptions')->insert([
                'user_id' => $user->id,
                'name' => $plan->name,
                'stripe_id' => $invoice['subscription'],
                'stripe_price' => $plan->stripe_price_id,
                'stripe_status' => 'active',
                'quantity' => 1,
                'trial_ends_at' => null,
                'ends_at' => $endDate,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Update or create subscription item
        $dbSubscription = DB::table('subscriptions')->where('stripe_id', $invoice['subscription'])->first();
        if ($dbSubscription) {
            $dbSubscription_item = DB::table('subscription_items')->where('subscription_id', $dbSubscription->id)->first();
            if ($dbSubscription_item) {
                DB::table('subscription_items')->where('subscription_id', $dbSubscription->id)->update([
                    'stripe_price' => $plan->stripe_price_id,
                    'stripe_id' => $invoice['lines']['data'][0]['subscription_item'],
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('subscription_items')->insert([
                    'subscription_id' => $dbSubscription->id,
                    'stripe_price' => $plan->stripe_price_id,
                    'stripe_id' => $invoice['lines']['data'][0]['subscription_item'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Create new invoice record
        $invoiceModel = new Invoices();
        $invoiceModel->user_id = $user->id;
        $invoiceModel->plan_id = $plan->id;
        $invoiceModel->save();

        // Log successful payment
        Log::info('Invoice payment succeeded:', ['invoice' => $invoice]);

        return response()->json(['status' => 'successfully processed']);
    }
}
