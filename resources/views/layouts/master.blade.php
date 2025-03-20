<!DOCTYPE html>
<html class="no-js" lang="" style="scroll-behavior:smooth;">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('APP_NAME') }} @yield('title', ' | ' . __('meta.title'))</title>

		<meta name="keywords" content="@yield('keywords', __('meta.keywords'))" />
		<meta name="description" content="@yield('description', __('meta.description'))">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('/favicon.ico')}}">
        <link rel="manifest" href="{{ asset('/site.webmanifest') }}">


        <!-- CSS Styles -->
        <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/css/main.css') }}">

        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('theme/css/animate.min.css') }}">

        <!-- Revolution Slider -->
        <link rel="stylesheet" href="{{ asset('theme/js/plugins/revolution/css/settings.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/js/plugins/revolution/css/layers.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/js/plugins/revolution/css/navigation.css') }}">

        <!-- Owl Carousel -->
        <link rel="stylesheet" href="{{ asset('theme/js/plugins/owl-carousel/owl.carousel.css') }}">

        <!-- Google Web Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,700,900' rel='stylesheet' type='text/css'>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('/css/dark-mode.css') }}">

        <!-- Toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

	<body>
		<div class="body">
			@include('layouts.header')

			@yield('content')

			@include('layouts.footer')
		</div>

		<!-- Sricpts -->
		<script src="{{asset('theme/js/plugins/jquery-1.11.3.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('theme/js/plugins/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('theme/js/plugins/modernizr-2.8.3-respond-1.4.2.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('theme/js/plugins/revolution/js/jquery.themepunch.tools.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('theme/js/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('theme/js/plugins/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('theme/js/plugins/parallax.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('theme/js/plugins/scrollReveal.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('theme/js/plugins/bootstrap-dropdownhover.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('theme/js/main.js')}}" type="text/javascript"></script>
        @if(request()->is('/'))
		    <script src="{{asset('theme/js/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}" defer></script><script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'90188cca5b76d0f7',t:'MTczNjgwNDQ4MS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/theme/js/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script>
        @endif

        <script src="{{asset('js/theme.js')}}" type="text/javascript"></script>
        <!-- Toastr -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            $(document).ready(function(){
                var errors = @json(session('errors', []));

                toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }

                var success = "{{ session('success') }}";

                if(success.length > 0){
                    toastr.success(success);
                }

                if (Array.isArray(errors) && errors.length > 0) {
                    errors.forEach(function(error) {
                        toastr.error(error);
                    });
                }
            })
        </script>
		@stack('js')
	</body>
</html>
