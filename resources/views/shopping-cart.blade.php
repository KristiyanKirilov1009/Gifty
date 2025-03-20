@extends('layouts.master')

@section('content')
<!-- Page Parallax Header -->
<div class="parallax-header parallax-window" data-parallax="scroll" data-image-src="{{asset('theme/img/backgrounds/shop-header.jpg')}}">
        <div class="overlay">
            <div class="parallax-caption">
                <div class="parallax-holder">
                    <h1>Количка</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Parallax Header -->

    <!-- Page Content -->
    <div class="container page-container">
        <div class="row">
            @if(session('cart') && count(session('cart')) > 0)
                <!-- Cart Content -->
                <div class="cart-page">
                    <div class="col-sm-8">
                        <div class="mycart-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-item-head">&nbsp;</th>
                                        <th class="cart-item-head">Артикул</th>
                                        <th class="cart-item-head">Цена</th>
                                        <th class="cart-item-head">Количество</th>
                                        <th class="cart-item-head">Общо</th>
                                        <th class="cart-item-head">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(session('cart') as $key=>$value)
                                        <tr class="cart-item">
                                            <td class="cart-item-cell cart-item-thumb">
                                                <img src="{{ $value['image'] ? Storage::url($value['image']) : asset('img/no-image.jpg') }}" class="img-responsive" alt="Alternative Text">
                                            </td>
                                            <td class="cart-item-cell cart-item-title">
                                                <h3><a href="{{ route('single-product', ['product' => $value['slug']]) }}">{{ $value['name'] }}</a></h3>
                                            </td>
                                            <td class="cart-item-cell cart-item-price">
                                                <span class="amount" id="price" data-price="{{ $value['price'] }}">{{ $value['price'] }} BGN</span>
                                            </td>
                                            <td class="cart-item-cell cart-item-quantity">
                                                <input type="number" name="cart[ {{ $key }} ][quantity]" id="quantity" data-quantity="{{ $value['quantity'] }}" min="1" max="{{ $products->where('id', $key)->first()->quantity }}" form="updateForm" value="{{ $value['quantity'] }}" onkeydown="return false">
                                            </td>
                                            <td class="cart-item-cell cart-item-subtotal">
                                                <span class="subtotal">{{ number_format(($value['price'] * $value['quantity']), 2, '.', '') }} BGN</span>
                                            </td>
                                            <td class="cart-item-cell cart-item-remove">
                                                <form action="{{ route('removeFromCart', ['product' => $key]) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <span>
                                                        <button type="submit" class="minicart-content-remove">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </span>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">
                                            <form action="{{ route('updateCart') }}" method="POST" id="updateForm">
                                                @csrf
                                                @method('PUT')
                                                <!-- Update Cart -->
                                                <div class="update-cart">
                                                    <button type="submit" class="btn small-btn-black">Актуализирай</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Cart Total -->
                    <div class="col-sm-4">
                        <div class="mycart-total">
                            <h2>Общо в количката</h2>
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Междинна сума</th>
                                        <td><span class="amount" id="checkout-subtotal"></span> BGN</td>
                                    </tr>

                                    <tr class="shipping">
                                        <th>Доставка</th>
                                        <td><span class="amount">0.00 BGN</span></td>
                                    </tr>

                                    <tr class="order-total">
                                        <th>Общо</th>
                                        <td><strong><span class="amount" id="total"></span> BGN</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('checkout') }}" class="btn btn-fullwidth">Поръчай</a>
                        </div>
                    </div>
                </div>
            @else
                <div style="display: flex; align-items: center; justify-content:center; gap:10px">
                    <img src="{{ asset('img/empty-cart.png') }}" height="50px" alt="Empty Cart"/>
                    <p>Количката е празна!</p>
                </div>
            @endif
        </div>
    </div>
    <!-- End Page Content -->
@endsection

@push('js')
<script>
    function calcTotal()
    {
        subtotal = document.getElementById("checkout-subtotal");
        total = document.getElementById("total");

        products = document.querySelectorAll(".subtotal");

        let sum = 0;
        $.each(products, function(key, value){
            sum += parseFloat(value.innerText)
        })

        subtotal.textContent = sum.toFixed(2);

        let totalSum = sum;

        total.textContent = totalSum.toFixed(2);
    }

    $(document).ready(function(){

        @if(session('cart'))
            calcTotal();
        @endif

        $(document).on("change", "#quantity", function(){
            var row = $(this).closest("tr");

            var price = row.find("#price").data("price");
            var quantity = parseFloat($(this).val());
            let total = (price * quantity).toFixed(2);

            row.find(".subtotal").text(total + " BGN");
            calcTotal();
        });
    })
</script>
@endpush
