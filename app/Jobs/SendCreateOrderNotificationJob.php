<?php

namespace App\Jobs;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendCreateOrderNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Order $order)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $customer = json_decode($this->order->customer);

        Mail::to($customer->email)->send(new OrderCreated($this->order, $customer));
        Mail::to(env('MAIL_ORDER_CREATED'))->send(new OrderCreated($this->order, $customer));
    }
}
