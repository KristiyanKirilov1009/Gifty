<?php

namespace App\Http\Controllers\Admin;

use App\Filters\OrderFilter;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Jobs\SendUpdateOrderNotificationJob;
use App\Models\Order;
use Laravel\Cashier\Cashier;

class OrderController extends AdminController
{
    public function __construct()
    {
        $this->datatable = ['id', 'status', 'amount', 'currency', 'customer', 'phone', 'created_at'];
        $this->module = 'orders';
        $this->filters = true;

        $this->authorizeResource(Order::class, 'order');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(OrderFilter $filter)
    {
        $records = Order::latest()->filter($filter)->paginate();

        return view('admin.orders.list', compact('records'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $products = $order->products;

        return view('admin.orders.show', compact('order', 'products'));
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

        SendUpdateOrderNotificationJob::dispatch($order);

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
