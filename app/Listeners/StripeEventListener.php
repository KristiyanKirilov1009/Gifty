<?php

namespace App\Listeners;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle received Stripe webhooks.
     */
    public function handle(WebhookReceived $event): void
    {
        Log::info($event->payload['type']);
        switch ($event->payload['type']) {
            case 'checkout.session.completed':
                $session = $event->payload['data']['object'];
                Log::info($session);
                $shipping = $session['shipping_details'];
                $customer = $session['customer'];
                if (! $customer) {
                    $customer = $session['customer_details'];
                }

                Order::create([
                    'status' => OrderStatus::Pending,
                    'amount' => $session['amount_total'] / 100,
                    'currency' => $session['currency'],
                    'stripe_payment_id' => $session['payment_intent'], // stripe payment intent id
                    'stripe_cs_id' => $session['id'], // stripe checkout session id
                    'shipping' => json_encode($shipping),
                    'customer' => json_encode($customer)
                ]);
                break;

            default:
                Log::info('Received unknown evet type ' . $event->payload['type']);
                break;
        }
    }
}
