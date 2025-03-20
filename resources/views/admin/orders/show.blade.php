@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Orders')
@section('content_header_title', 'Order')
@section('content_header_subtitle', 'Details')


@section('css')
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme-shop.css')}}">
@stop


@php
$customer = json_decode($order->customer);
$shipping = json_decode($order->shipping);
@endphp

{{-- Content body: main page content --}}

@section('content_body')
<div class="row">
    <div class="col-12">
        <!-- Relation and additional settings -->
        <div class="card card-primary card-outline elevation-3 shop">
            <div class="card-header p-2">
                <div class="row">
                    <div class="col-6">
                        <h3 class="card-title">Order Details</h3>
                    </div>
                    <div class="col-6">
                        <div class="row justify-content-end pr-5">
                            <form class="form-inline" action="{{ route('admin.'.$module.'.update', ['order' => $order]) }}" method="POST" >
                                @csrf
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="status" class="mr-3">{{ trans('admin.'.$module.'.fields.status.title') }}</label>
                                    <select class="select2bs4" name="status" style="width: 200px;">
                                        <option value="">{{ trans('admin.'.$module.'.fields.status.placeholder') }}</option>
                                        @foreach(\App\Enums\OrderStatus::cases() as $case)
                                            <option value="{{ $case->value }}" {{ old('status', $order->status) == $case->value ? 'selected' : '' }}>{{ $case->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-warning mb-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="d-flex flex-column flex-md-row justify-content-between py-3 px-4 my-4">
                            <div class="text-center">
                                <span>
                                    Order Number <br>
                                    <strong class="text-color-dark">#{{ $order->id }}</strong>
                                </span>
                            </div>
                            <div class="text-center mt-4 mt-md-0">
                                <span>
                                    Date <br>
                                    <strong class="text-color-dark">{{ $order->created_at->format('Y-m-d') }}</strong>
                                </span>
                            </div>
                            <div class="text-center mt-4 mt-md-0">
                                <span>
                                    Email <br>
                                    <strong class="text-color-dark">{{ $customer->email }}</strong>
                                </span>
                            </div>
                            <div class="text-center mt-4 mt-md-0">
                                <span>
                                    Total <br>
                                    <strong class="text-color-dark">{{ $order->amount }} BGN</strong>
                                </span>
                            </div>
                            <div class="text-center mt-4 mt-md-0">
                                <span>
                                    Payment Method <br>
                                    <strong class="text-color-dark">Paid</strong>
                                </span>
                            </div>
                        </div>
                        <div class="card border-width-3 border-radius-0 border-color-hover-dark mb-4">
                            <div class="card-body">
                                <!-- <h4 class="font-weight-bold text-uppercase text-4 mb-3">Your Order</h4> -->
                                <table class="shop_table cart-totals mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="border-top-0">
                                                <strong class="text-color-dark">Product</strong>
                                            </td>
                                            <td class="border-top-0 text-center">
                                                <strong class="text-color-dark">Quantity</strong>
                                            </td>
                                            <td class="border-top-0">

                                            </td>
                                        </tr>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <strong class="d-block text-color-dark line-height-1 font-weight-semibold">{{ $product->name }}</strong>
                                            </td>
                                            <td class="text-center">
                                                <strong class="d-block text-color-dark line-height-1 font-weight-semibold"><span class="product-qty">x{{ $product->pivot->quantity }}</span></strong>
                                            </td>
                                            <td class="text-end align-top">
                                                <span class="amount font-weight-medium text-color-grey">{{ number_format(($product->pivot->price), 2) }} BGN</span>
                                            </td>
                                        </tr>
                                        @endforeach

                                        <tr class="cart-subtotal">
                                            <td colspan="2" class="border-top-0">
                                                <strong class="text-color-dark">Subtotal</strong>
                                            </td>
                                            <td class="border-top-0 text-end">
                                                <strong><span class="amount font-weight-medium">{{ $order->amount }} BGN</span></strong>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <td colspan="2" class="border-top-0">
                                                <strong class="text-color-dark">Shipping</strong>
                                            </td>
                                            <td class="border-top-0 text-end">
                                                <strong><span class="amount font-weight-medium">Free Shipping</span></strong>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="2">
                                                <strong class="text-color-dark text-3-5">Total</strong>
                                            </td>
                                            <td class="text-end">
                                                <strong class="text-color-dark"><span class="amount text-color-dark text-5">{{ $order->amount }} BGN</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <h2 class="text-color-dark font-weight-bold text-5-5 mb-1">Billing Address</h2>
                                <ul class="list list-unstyled text-2 mb-0">
                                    <li class="mb-0">{{ $customer->first_name . ' ' . $customer->last_name }}</li>
                                    <li class="mb-0">{{ $customer->address->line1 ? ', ' : ' ' }}{{ $customer->address->country }}</li>
                                    <li class="mb-0">{{ $customer->address->city }}, {{ $customer->address->postcode }}</li>
                                    <li class="mb-0">{{ $customer->phone }}</li>
                                    <li class="mt-3 mb-0">{{ $customer->email }}</li>
                                </ul>
                            </div>
                            {{--<div class="col-lg-6">
                                <h2 class="text-color-dark font-weight-bold text-5-5 mb-1">Shipping Address</h2>
                                <ul class="list list-unstyled text-2 mb-0">
                                    <li class="mb-0">{{ $shipping->name }}</li>
                                    <li class="mb-0">{{ $shipping->address->line1}}, {{ $shipping->address->country }}</li>
                                    <li class="mb-0">{{ $shipping->address->city }} {{ $shipping->address->postal_code }}</li>
                                    <li class="mb-0">{{ $customer->phone }}</li>
                                    <li class="mt-3 mb-0">{{ $customer->email }}</li>
                                </ul>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.'.$module.'.index') }}" class="btn btn-secondary">{{ __('buttons.cancel') }}</a>
            </div>
        </div>
    </div>
</div>

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> --}}
@endpush
