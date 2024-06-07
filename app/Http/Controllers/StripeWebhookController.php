<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Cashier;
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
        Log::info('Stripe Webhook received:', $payload);
        dd($payload);

        // Handle the event
        switch ($payload['type']) {
            case 'invoice.payment_succeeded':
                $this->handleInvoicePaymentSucceeded($payload['data']['object']);
                break;

            case 'customer.subscription.updated':
                $this->handleSubscriptionUpdated($payload['data']['object']);
                break;

            case 'customer.subscription.deleted':
                $this->handleSubscriptionDeleted($payload['data']['object']);
                break;

            // Add other event handlers as needed
        }

        return response()->json(['status' => 'success']);
    }

    protected function handleInvoicePaymentSucceeded($invoice)
    {
        // Handle successful payment (e.g., update subscription status)
        Log::info('Invoice payment succeeded:', $invoice);
    }

    protected function handleSubscriptionUpdated($subscription)
    {
        // Handle subscription update
        Log::info('Subscription updated:', $subscription);
    }

    protected function handleSubscriptionDeleted($subscription)
    {
        // Handle subscription deletion
        Log::info('Subscription deleted:', $subscription);
    }
}
