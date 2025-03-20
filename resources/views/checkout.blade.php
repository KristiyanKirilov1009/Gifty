@extends('layouts.master')

@section('content')
<!-- Page Parallax Header -->
<div class="parallax-header parallax-window" data-parallax="scroll" data-image-src="{{asset('theme/img/backgrounds/shop-header.jpg')}}">
        <div class="overlay">
            <div class="parallax-caption">
                <div class="parallax-holder">
                    <h1>Потвърждаване на поръчката</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Parallax Header -->

    <!-- Page Content -->
    <div class="container page-container">
        <div class="row">
            <form action="{{ route('order') }}" method="POST">
                @csrf
                <div class="checkout-content clearfix">

                    <!-- Cart Content -->
                    <div class="col-sm-7">

                        <!-- Billing Details -->
                        <div class="checkout-billing">
                            <h3>Данни за клиента</h3>

                            <!-- Form Inputs -->
                            <form class="form-inline">

                                <!-- Name -->
                                <div class="checkout-first-row">
                                    <div class="col-no-p checkout-input col-sm-6">
                                        <label>Име <span> * </span></label><br>
                                        <input type="text" name="first_name" class="@error('first_name') is-invalid @enderror" placeholder="Попълнете Вашето име" value="{{ old('first_name') }}">
                                        <div class="invalid-feedback">
                                            @error('first_name') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-no-p checkout-input col-sm-6">
                                        <label>Фамилия <span> * </span></label><br>
                                        <input type="text" name="last_name" class="@error('last_name') is-invalid @enderror" placeholder="Попълнете Вашата фамилия" value="{{ old('last_name') }}">
                                        <div class="invalid-feedback">
                                            @error('last_name') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="checkout-first-row">
                                    <div class="col-no-p checkout-input col-sm-6">
                                        <label>Имейл <span> * </span></label><br>
                                        <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Въведете Вашия имейл адрес" value="{{ old('email') }}">
                                        <div class="invalid-feedback">
                                            @error('email') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-no-p checkout-input col-sm-6">
                                        <label>Телефон <span> * </span></label><br>
                                        <input type="tel" name="phone" class="@error('phone') is-invalid @enderror" placeholder="Въведете телефонен номер" value="{{ old('phone') }}">
                                        <div class="invalid-feedback">
                                            @error('phone') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                {{--
                                <!-- Country -->
                                <div class="col-no-p checkout-input col-sm-12">
                                    <label>Държава <span> * </span></label><br>
                                    <input type="text" name="country" class="@error('country') is-invalid @enderror" placeholder="Въведете държава" value="{{ old('country') }}">
                                    <div class="invalid-feedback">
                                            @error('country') {{ $message }} @enderror
                                        </div>
                                </div>
                                --}}
                                <!-- Town -->
                                <div class="checkout-first-row">
                                    <div class="col-no-p checkout-input col-sm-6">
                                        <label>Град <span> * </span></label><br>
                                        <input type="text" name="city" class="@error('city') is-invalid @enderror" placeholder="Въведете град" value="{{ old('city') }}">
                                        <div class="invalid-feedback">
                                            @error('city') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-no-p checkout-input col-sm-6">
                                        <label>ПК <span> * </span></label><br>
                                        <input type="text" name="postcode" class="@error('postcode') is-invalid @enderror" placeholder="Пощенски код" value="{{ old('postcode') }}">
                                        <div class="invalid-feedback">
                                            @error('postcode') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Adress -->
                                <div class="col-no-p checkout-input col-sm-12">
                                    <label>Адрес <span> * </span></label><br>
                                    <input type="text" name="address" class="@error('address') is-invalid @enderror" placeholder="Въведете Вашия адрес" value="{{ old('address') }}">
                                    <div class="invalid-feedback">
                                        @error('address') {{ $message }} @enderror
                                    </div>
                                </div>
                                {{--
                                <div class="col-no-p checkout-input col-sm-12">
                                    <input type="text" name="line1" placeholder="Apartment, suite, unit etc.(optional)">
                                </div>
                                --}}
                                <!-- Order Notes -->
                                <div class="col-no-p checkout-input col-sm-12">
                                    <label>Бележка</label><br>
                                    <textarea placeholder="Оставете бележка, ако имате специфични изисквания към поръчката или доставката" name="notes" rows="2" cols="5">{{ old('notes') }}</textarea>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if(session('cart'))
                        <!-- Cart Total -->
                        <div class="col-sm-5">
                            <div class="checkout-order">
                                <h2>Вашата поръчка</h2>

                                <!-- Order Table -->
                                <table style="width:100%">
                                    <!-- Title -->
                                    <thead>
                                        <tr>
                                            <th class="order-product">Продукти</th>
                                            <th class="order-total">Общо</th>
                                        </tr>
                                    </thead>

                                    <!-- Products -->
                                    <tbody>
                                        @foreach(session('cart') as $key => $value)
                                            <tr>
                                                <td>{{ $value['name'] }} <span class="minicart-product-quantity">x {{ $value['quantity'] }}</span></td>
                                                <td align="right"><span class="product">{{ number_format($value['price'] * $value['quantity'], 2, '.', '') }} BGN</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <!-- Shipping -->
                                    <tfoot class="checkout-shipping">
                                        <tr>
                                            <th>Доставка</th>
                                            <td align="right">
                                                <div class="radio">
                                                    <label>Безплатна доставка</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="shipping-total">
                                            <th>Total</th>
                                            <td>
                                                <span id="total"></span> BGN
                                                <input type="hidden" id="hiddenTotal" name="total">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <h2></h2>
                                <button type="submit" class="btn btn-fullwidth">Потвърди</button>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <!-- End Page Content -->
@endsection

@push('js')
<script>
    $(document).ready(function(){

        @if(session('cart'))
        {
            let total = 0;

            products = document.querySelectorAll(".product")

            $(products).each(function(key, value){
                total += parseFloat(value.innerHTML);
            });

            document.getElementById("total").innerText = total.toFixed(2);
            hiddenInput = document.getElementById("hiddenTotal").value = total.toFixed(2);
            console.log(hiddenInput);
        }
        @endif
    })

</script>
@endpush
