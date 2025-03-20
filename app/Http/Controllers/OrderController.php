<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Filters\OrderFilter;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Jobs\SendCreateOrderNotificationJob;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Support\Facades\Notification;
use Laravel\Cashier\Cashier;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderFilter $filter)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => [
                'country' => $request->country ?? 'Bulgaria',
                'city' => $request->city,
                'address' => $request->address,
                'postcode' => $request->postcode,
                'line1' => $request->line1 ?? null 
            ],
            'notes' => $request->notes
        ];

        $order = Order::create([
            'status' => OrderStatus::Processing,
            'amount' => $request->total,
            'customer' => @json_encode($data)
        ]);

        foreach(session('cart') as $key => $value)
        {
            $order->products()->attach($key, ['quantity' => $value['quantity'], 'price' => $value['price']]);
        }

        session()->forget('cart');

        foreach($order->products as $prod)
        {
            $prod->quantity -= $prod->pivot->quantity;

            if($prod->quantity == 0)
            {
                $prod->is_hidden = true;
            }

            $prod->save();
        }

        $request->session()->flash('success', 'Order made successfully');

        SendCreateOrderNotificationJob::dispatch($order);

        return redirect()->route('/shopping-cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->fill($request->only('status'))->save();

        return redirect('/admin/orders')->with('success', __('messages.success.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
