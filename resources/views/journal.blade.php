@extends('layouts.master')

@section('content')
<!-- Page Parallax Header -->
<div class="parallax-header parallax-window" data-parallax="scroll" data-image-src="{{asset('theme/img/backgrounds/hero-bg-2.jpg')}}">
        <div class="ent-overlay">
            <div class="parallax-caption">
                <div class="parallax-holder">
                    <h1>Изкуството да подаряваш</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Parallax Header -->

    <!-- Page Content -->
    <div class="container page-container">
        <div class="row">
            <div class="journal-page">
                @if($blogs->isEmpty())
                    <div class="text-center">
                        <p>Очаквайте скоро ...</p>
                    </div>
                @endif

                @foreach($blogs as $blog)
                    <!-- Item -->
                    <div class="col-sm-4 journal-item">
                        <a href="{{ route('journal.show', ['blog' => $blog]) }}">
                            <div class="journal-image">
                                <figure>
                                    <img src="{{$blog->image ? Storage::url($blog->image->filepath) : asset('img/no-image.jpg')}}" width="370" class="center-journal-image" alt="Alternative Text">
                                </figure>
                            </div>
                            <div class="journal-caption" style="height:140px;">
                                <h3 class="truncate">{{ $blog->title }}</h3>
                                <p class="truncate">{{ $blog->description }}</p>
                            </div>
                            <span class="journal-category">{{ $blog->created_at->format('d-m-Y') }}</span>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
        {{ $blogs->links('vendor.pagination.default') }}
    </div>
    <!-- End Page Content -->
@endsection
