@extends('layouts.master')

@section('title', ' | ' . $product->meta_title)
@section('keywords', $product->meta_keywords)
@section('description', $product->meta_description)


@section('content')
<form action="{{ route('addToCart', ['product' => $product]) }}" method="POST">
    @csrf

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{ route('categories', ['category' => $product->category->parent]) }}" >{{ $product->category->parent->name }}</a></li>
                <li><a href="{{ route('categories', ['category' => $product->category]) }}" >{{ $product->category->name }}</a></li>
                <li class="active">{{ $product->name }}</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Product Content -->
    <div class="container page-container">
        <div class="row">

            <!-- Product Image Carousel -->
            <div class="col-sm-7">
                <div id="products-carousel" class="owl-carousel">
                    @if(count($product->images) > 0)
                        @foreach($product->images as $image)
                        <div class="item">
                            <img src="{{ Storage::url($image->filepath)}}" class="img-responsive" alt="Alternative Text">
                        </div>
                        @endforeach
                    @else
                    <div class="item">
                        <img src="{{ asset('img/no-image.jpg') }}" class="img-responsive" alt="Alternative Text">
                    </div>
                    @endif
                </div>
            </div>

            <!-- Product Information -->
            <div class="col-sm-5">
                <div class="product-content">
                    <header>
                        <!-- Item Category -->
                        <div class="item-category">{{ $product->category->name }}</div>

                        <!-- Title -->
                        <h3 class="item-title">{{ $product->name }}</h3>

                        <div class="separator"></div>

                        <!-- Price -->
                        <div class="single-item-price">{{ $product->price }} BGN</div>

                        <!-- Quantity -->
                        <div class="product-quantity">
                            <button class="minus" id="minus">-</button>
                                <input type="text" id="quantity" name="quantity" value="1" size="4" readonly>
                            <button class="plus" id="plus">+</button>
                        </div>
                    </header>

                    <div class="product-details">
                        {!! $product->description !!}
                    </div>

                    <!-- Button -->
                     <button type="submit" class="btn btn-fullwidth" id="addToCartBtn">Добави в количката</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Content -->

    <!-- Products Description -->
    <div class="products-description-content text-center">

        <!-- Item -->
        <div class="product-description">
            <h3>Сподели</h3>
            <div class="product-social-icon">
                <a href="#x"><i class="fa-brands fa-twitter fa-lg"></i></a>
                <a href="#x"><i class="fa-brands fa-instagram fa-lg"></i></a>
                <a href="#x"><i class="fa-brands fa-facebook fa-lg"></i></a>
                <a href="#x"><i class="fa-brands fa-pinterest fa-lg"></i></a>
                <a href="#x"><i class="fa-brands fa-behance fa-lg"></i></a>
            </div>
        </div>

    </div>
    <!-- End Products Description -->

    <!-- Related Post -->
    @if(count($product->category->products->where('id', '!=', $product->id)) > 0)
    <div class="related-section">
        <div class="container">

            <!-- Title -->
            <div class="related-title">
                <h3>Related Products</h3>
            </div>

            <div class="col-sm-4">
                <!-- Item -->
                @foreach($product->category->products->where('id', '!=', $product->id)->take(3) as $prod)
                    <div class="works-item">
                        <a href="{{ route('single-product', ['product' => $prod]) }}">
                            <!-- Image -->
                            <figure>
                                <img src="{{ count($prod->images) > 0 ? Storage::url($prod->images->first()->filepath) : asset('img/no-image.jpg') }}" alt="Alternative Text" class="img-responsive">
                            </figure>
                            <div class="works-caption text-center">
                                <!-- Item Category -->
                                <div class="item-category">{{ $prod->category->name }}</div>

                                <!-- Title -->
                                <h3 class="item-title">{{ $prod->name }}</h3>

                                <div class="item-separator"></div>

                                <!-- Price -->
                                <div class="item-price">{{ $prod->price }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!-- End Related Post -->
</form>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        let current = document.getElementById("quantity").value;
        let quantity = "{{ $product->quantity }}";

        if(current <= 1)
        {
            document.getElementById("minus").disabled = true;
            document.getElementById("minus").style.opacity = "0.5";
            document.getElementById("minus").style.cursor = "not-allowed";
        }

        if(quantity == 1)
        {
            document.getElementById("minus").disabled = true;
            document.getElementById("minus").style.opacity = "0.5";
            document.getElementById("minus").style.cursor = "not-allowed";

            document.getElementById("plus").disabled = true;
            document.getElementById("plus").style.opacity = "0.5";
            document.getElementById("plus").style.cursor = "not-allowed";
        }

        $("#minus").click(function(e){
            e.preventDefault();

            current = document.getElementById("quantity").value;
            document.getElementById("quantity").value = --current;

            if(current <= 1)
            {
                document.getElementById("minus").disabled = true;
                document.getElementById("minus").style.opacity = "0.5";
                document.getElementById("minus").style.cursor = "not-allowed";
            }

            if(current < quantity)
            {
                document.getElementById("plus").disabled = false;
                document.getElementById("plus").style.opacity = "1";
                document.getElementById("plus").style.cursor = "pointer";
            }
        });

        $("#plus").click(function(e){
            e.preventDefault();

            current = document.getElementById("quantity").value;
            document.getElementById("quantity").value = ++current;

            if(current > 1)
            {
                document.getElementById("minus").disabled = false;
                document.getElementById("minus").style.opacity = "1";
                document.getElementById("minus").style.cursor = "pointer";
            }

            if(current >= quantity)
            {
                document.getElementById("plus").disabled = true;
                document.getElementById("plus").style.opacity = "0.5";
                document.getElementById("plus").style.cursor = "not-allowed";
            }

        })
    });
</script>

@endpush
