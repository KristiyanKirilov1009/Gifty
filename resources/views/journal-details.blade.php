@extends('layouts.master')

@section('content')
 <!-- Page Parallax Header -->
 <div class="parallax-header parallax-window" data-parallax="scroll" data-image-src="{{asset('theme/img/backgrounds/about-header-bg.jpg')}}">
            <div class="overlay">
                <div class="parallax-caption">
                    <div class="parallax-holder">
                        <h1>{{ $blog->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Parallax Header -->

        <!-- Page Content -->
        <div class="container page-container">
            <div class="row">
                <div class="about-content col-sm-12">
                    <!-- Story -->
                    <h3>{{ $blog->title }}</h3>
                    <div class="footer-separator"></div>


                    <p>
                        <img src="{{$blog->image ? Storage::url($blog->image->filepath) : asset('img/no-image.jpg')}}" width="500" class="image-journal-details" alt="Alternative Text">
                        {{ $blog->description }}
                    </p>

                    <!-- Space Helper Class -->
                    <div class="padding-top-x70"></div>

                    <!-- Space Helper Class -->
                    <div class="padding-top-x70"></div>
                </div>
            </div>
        </div>
        <!-- End Page Content -->
@endsection
