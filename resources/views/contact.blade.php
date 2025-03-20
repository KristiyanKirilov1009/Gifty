@extends('layouts.master')

@section('content')
<!-- Page Parallax Header -->
<div class="parallax-header parallax-window" data-parallax="scroll" data-image-src="{{asset('theme/img/backgrounds/contact-header-bg.jpg')}}">
    <div class="ent-overlay">
        <div class="parallax-caption">
            <div class="parallax-holder">
                <h1>Тук сме за теб</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Parallax Header -->

<!-- Page Content -->
<div class="container page-container">
    <div class="row">
        <div class="contact-page">

            <!-- General Information -->
            <div class="col-sm-6">
                <div class="contact-info">
                    <br>
                    <p>Имаме удоволствието да се свържем с вас! Ако имате въпроси относно нашите продукти, поръчки или просто искате да споделите мнение, не се колебайте да се свържете с нас. Нашият екип е на разположение да отговори на всяко ваше запитване и да ви помогне по всякакъв начин.</p> <br>
                    <p>Можете да използвате контакната формата или да ни изпратите имейл. Ще отговорим възможно най-скоро и ще се постараем да направим вашето преживяване с нас още по-добро.</p> <br>
                    <p>Очакваме вашето съобщение с нетърпение!</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-sm-6">
                <form class="form-horizontal contact-form" action="{{ route('contact.send') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label class="control-label">Име <span>*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  required>
                        <div class="invalid-feedback">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label class="control-label">Телефон <span>*</span></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                        <div class="invalid-feedback">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label class="control-label">Email <span>*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        <div class="invalid-feedback">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="form-group">
                        <label class="control-label">Съобщение <span>*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="7" name="description" value="{{ old('description') }}" required></textarea>
                        <div class="invalid-feedback">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="g-recaptcha mt-4" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="btn big-btn">Изпрати</button>
                    </div>
                    <div class="invalid-feedback">
                        @error('g-recaptcha-response')
                            This field is  required!
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->
@endsection
