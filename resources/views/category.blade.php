@extends('layouts.master')

@section('content')
    <!-- Page Parallax Header -->
    <div class="parallax-header parallax-window" data-parallax="scroll" data-image-src="{{asset('theme/img/backgrounds/shop-header.jpg')}}">
        <div class="ent-overlay">
            <div class="parallax-caption">
                <div class="parallax-holder">
                    <h1>{{ $category->name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Parallax Header -->

    <!-- Breadcrumb -->
    @if($category->parent_id !== null)
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{ route('categories', ['category' => $category->parent]) }}" >{{ $category->parent->name }}</a></li>
                <li class="active">{{ $category->name }}</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    @endif

    <!-- Page Content -->
    <div class="container page-container">
        <div class="row">
            <div class="shop-page">
                <!-- Categories Nav -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">Всички ({{ count($products) }}) </a></li>
                    @foreach($category->children as $child)
                        <li role="presentation"><a href="#{{$child->slug}}" aria-controls="{{$child->slug}}" role="tab" data-toggle="tab">{{$child->name}} ( {{count($products->where('category_id', $child->id))}} )</a></li>
                    @endforeach
                </ul>

                <!-- Categories Content -->
                <div class="tab-content">
                    <!-- All -->
                    <div role="tabpanel" class="tab-pane fade in active" id="all">
                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <!-- Item -->
                            <div class="col-sm-6 col-md-4 works-item">
                                <a href="{{ route('single-product', ['product' => $product]) }}">
                                    <div class="item-offer">
                                        <!-- Image -->
                                        <figure>
                                            <img src="{{ count($product->images) > 0 ? Storage::url($product->images->first()->filepath) : asset('img/no-image.jpg')}}" alt="Alternative Text" class="img-responsive">
                                        </figure>
                                    </div>

                                    <div class="works-caption text-center">
                                        <!-- Item Category -->
                                        <div class="item-category">{{ $product->category->name }}</div>

                                        <!-- Title -->
                                        <h3 class="item-title" style="height:50px;">{{ $product->name }}</h3>

                                        <div class="item-separator"></div>

                                        <!-- Price -->
                                        <div class="item-price">{{ $product->price }} BGN</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center">Очаквайте много скоро ...</p>
                    @endif
                    </div>

                    @foreach($category->children as $child)
                        <div role="tabpanel" class="tab-pane fade" id="{{$child->slug}}">
                            @if(count($products->where('category_id', $child->id)) > 0)
                                <!-- Item -->
                                @foreach($products->where('category_id', $child->id) as $product)
                                    <div class="col-sm-6 col-md-4 works-item">
                                        <a href="{{ route('single-product', ['product' => $product]) }}">
                                            <!-- Image -->
                                            <figure>
                                                <img src="{{ count($product->images) > 0 ? Storage::url($product->images->first()->filepath) : asset('img/no-image.jpg')}}" alt="Alternative Text" class="img-responsive">
                                            </figure>
                                            <div class="works-caption text-center">
                                                <!-- Item Category -->
                                                <div class="item-category">{{ $child->name }}</div>

                                                <!-- Title -->
                                                <h3 class="item-title">{{ $product->name }}</h3>

                                                <div class="item-separator"></div>

                                                <!-- Price -->
                                                <div class="item-price">{{ $product->price }} BGN</div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center">Очаквайте много скоро ...</p>
                            @endif
                        </div>
                    @endforeach
                </div>
                <!-- End Categories Content -->
            </div>
        </div>
    </div>
    <!-- End Page Content -->
@endsection
