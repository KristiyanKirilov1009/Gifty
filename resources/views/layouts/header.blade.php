<!-- Loader Start -->
 @if(request()->is('/'))
    <div id="preloader">
        <div class="preloader-container">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div>
@endif
<!-- End Loader Start -->

<!-- Top Bar Start -->
<div class="topbar">
    <div class="pull-left">
        <div class="topbar-message hidden-xs">
            <p>Безплатна доставка за цяла <span>България</span></p>
        </div>
    </div>

    <div class="pull-right">

        <!-- Shop Menu -->
        <ul class="shop-menu">
            <!-- Cart -->
            <li class="shop-cart">
                <a href="{{ route('shopping-cart') }}" class="btn btn-sm">Количка ({{ session('cart') ? count(session('cart')) : 0 }}) </a>

                <!-- Cart Popover -->
                <div class="shop-minicart">
                    <div class="minicart-content">

                        @if(session('cart') && count(session('cart')) > 0)
                            <!-- Added Items -->
                            <ul class="minicart-content-items clearfix">
                                @foreach(session('cart') as $key=>$value)
                                    <!-- Item -->
                                    <li class="media">
                                        <div class="media-left">
                                            <!-- Image -->
                                            <img src="{{ $value['image'] ? Storage::url($value['image']) : asset('img/no-image.jpg') }}" class="media-object" alt="Alternative Text">
                                        </div>

                                        <div class="minicart-content-details media-body">
                                            <!-- Title -->
                                            <h3><a href="#">{{ $value['name'] }}</a></h3>

                                            <!-- Price -->
                                            <span class="minicart-content-price">{{ $value['price'] }} <span class="minicart-product-quantity">x {{ $value['quantity'] }}</span> </span>
                                        </div>

                                        <!-- Remove -->
                                        <form action="{{ route('removeFromCart', ['product' => $key]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <span class="minicart-content-remove">
                                                <button type="submit" class="minicart-content-remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </span>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Subtotal -->
                            <div class="minicart-content-total">
                                <h3>Subtotal: <span id="subtotal"></span> BGN</h3>
                            </div>

                            <!-- Checkout -->
                            <div class="shop-menu-checkout">
                                <div class="shop-viewcart pull-left">
                                    <a href="{{ route('shopping-cart') }}" class="btn btn-sm text-center">Количка</a>
                                </div>
                                <div class="shop-checkout pull-right">
                                    <a href="{{ route('checkout') }}" class="btn btn-sm">Поръчай</a>
                                </div>
                            </div>
                        @else
                        <div style="display: flex; align-items: center; justify-content:center; gap:10px;">
                            <img src="{{ asset('img/empty-cart.png') }}" height="50px" alt="Empty Cart"/>
                            <p style="font-family:'Merriweather', serif; color:#FFF3E0;">Количката е празна!</p>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- End Cart Popover -->
            </li>
        </ul>
    </div>
</div>
<!-- Top Bar End -->

<!-- Header Start -->
<header class="{{request()->is('/') ? 'header header-transparent' : 'header-static'}}">

    <!-- Navbar -->
    <nav class="navbar navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Logo -->
            <div class="logo center">
                <a href="/">
                    <img src="{{ asset('theme/img/logo-white.png') }}" alt="Alternative Text" class="img-responsive">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/">Начало</a></li>
                    <li><a href="{{ route('about') }}">За нас</a></li>
                    <li class="dropdown">
                        <a href class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn">{{ __('Артикули') }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                <li><a href="{{ route('categories', ['category' => $category->slug]) }}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('journal') }}">Блог</a></li>
                    <li><a href="{{ route('contact') }}">Контакти</a></li>
                    <li><a href="{{ route('terms') }}">Информация</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End Header -->

@push('js')
<script>
    $(document).ready(function(){
        @if(session('cart'))
            var cart = @json(session('cart', []));
            subtotal = document.getElementById("subtotal");

            let sum = 0;

            $.each(cart, function(key, value){
                sum += value.price * value.quantity;
            })

            subtotal.textContent = sum.toFixed(2);
        @endif
    })
</script>
@endpush
