@extends('layouts.master')
@section('content')
<!-- Hero Content -->
<div id="hero-fullscreen" class="rev_slider">
        <ul>
            <li data-transition="fade" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000">
                <!-- Background Image -->
                <img src="{{asset('theme/img/backgrounds/hero-bg.jpg')}}" alt="Alternative Text" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10">

                <!-- Background Overlay -->
                <div class="tp-caption"
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                    data-width="full"
                    data-height="full"
                    data-whitespace="nowrap"
                    data-transform_idle="o:1;"
                    data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;"
                    data-transform_out="s:300;s:300;"
                    data-start="750"
                    data-basealign="slide"
                    data-responsive_offset="on"
                    data-responsive="off"
                    style="z-index: 5;background-color:rgba(0, 0, 0, 0.50);border-color:rgba(0, 0, 0, 0.50);">
                </div>

                <!-- Layer -->
                <div class="tp-caption hero-title"
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','1']"
                    data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                    data-mask_in="x:0px;y:0px;"
                    data-mask_out="x:0;y:0;"
                    data-start="1000"
                    data-responsive_offset="on"
                    style="z-index: 6;">
                    <!-- <h1>A selection of creative <br class="rwd-break"> commissioned works.</h1> -->
                    <h1>{{ __('home.hero.title') }}</h1>
                </div>

                <!-- Layer -->
                <div class="tp-caption hero-description"
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['-72','-72','-72','-48']"
                    data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                    data-mask_in="x:0px;y:0px;"
                    data-mask_out="x:0;y:0;"
                    data-start="1000"
                    data-responsive_offset="on"
                    style="z-index: 7;"><h4>{{ __('home.hero.subtitle') }}</h4>
                </div>

                <!-- Button -->
                <div class="tp-caption"
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['92','92','92','76']"
                    data-transform_in="y:50px;opacity:0;s:1500;e:Power4.easeInOut;"
                    data-start="1000"
                    data-responsive_offset="on"
                    data-responsive="off"
                    style="z-index: 8;"><a href="#collection" class="btn big-btn" href="shop.html">Колекция</a>
                </div>
            </li>
        </ul>
        <div class="tp-static-layers"></div>
        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
    </div>
    <!-- Hero Content -->

    <!-- About Section Start -->
    <section class="about-section" id="collection">
        <div class="container">
            <div class="row">

                <!-- Description -->
                <div class="about-content clearfix">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h3>Открийте идеалния подарък за всеки</h3>
                        <div class="separator"></div>
                        <p>🎁 За мъже – Стилни и практични подаръци, които съчетават елегантност и функционалност. От луксозни аксесоари до модерни джаджи – тук ще намерите всичко за всеки мъж.
                            <br> <hr>
                            🎀 За жени – Красиви и изискани изненади, които носят радост и стил. Парфюми, бижута, козметика и още много вдъхновяващи идеи за специалните дами в живота ви.
                            <br> <hr>
                            🧸 За деца – Забавни, креативни и образователни подаръци, които карат детските очи да светят от щастие. Играчки, книжки и вълнуващи изненади за всяка възраст.
                        </p>
                    </div>
                </div>

                <!-- Featured Collections -->
                <div class="featured-collections clearfix">
                    @foreach($categories as $category)
                        <!-- Item -->
                        <div class="col-sm-4 featured-collections-item">
                            <a href="{{ route('categories', ['category' => $category]) }}">
                                <div class="thumbnail">
                                    <img src="{{$category->image ? Storage::url($category->image->filepath) : asset('theme/img/backgrounds/abstract-bg.jpg')}}" width="370" alt="Alternative Text">
                                    <div class="overlay">
                                        <div class="caption">
                                            <h3><b>{{ $category->name }}</b></h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- New Arrivals Section -->
    @if(!$products->isEmpty())
    <section class="arrivals-section">
        <div class="works-title clearfix">
            <div class="col-sm-12">
                <h3>Най-нови</h3>
                <div class="separator"></div>
            </div>
        </div>

        <div id="items-carousel">
        @foreach($products as $product)
            <!-- Item -->
            <div class="works-item" data-sr='wait 0.1s, ease-in 20px'>
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
        </div>
    </section>
    <!-- End New Arrivals Section -->
    @endif

    <!-- Call to Action Section -->
    <section class="call-section">
        <div class="overlay">
            <div class="parallax-caption">
                <div class="parallax-holder">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2>БЛОГ</h2>
                        <div class="separator"></div>
                        <p>Намерете уникални подаръци за мъже, жени и деца. Разгледайте нашия блог за вдъхновение, съвети и най-новите тенденции в подаръчните идеи!</p>
                        <div class="call-btn">
                            <a href="{{ route('journal') }}">Прочети</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call to Action Section -->
@endsection