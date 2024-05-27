<!DOCTYPE html>
<html lang="en">


<!-- molla/index-6.html  22 Nov 2019 09:56:18 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TD - @if(!empty($header_title)) {{$header_title}} @endif</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("assets/images/icons/apple-touch-icon.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("assets/images/icons/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/images/icons/favicon-16x16.png")}}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="mask-icon" href="{{asset("assets/images/icons/safari-pinned-tab.svg")}}" color="#666666">
    <link rel="shortcut icon" href="{{asset("assets/images/icons/favicon.ico")}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset("assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css")}}">
    <!-- Plugins CSS File -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/plugins/owl-carousel/owl.carousel.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/plugins/magnific-popup/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/plugins/jquery.countdown.css")}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/skins/skin-demo-6.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/demos/demo-6.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('styles')
    @livewireStyles
    <style>
        .font-tv {
            font-family: 'Roboto', sans-serif !important;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        @include('client.layouts.header')

        <main class="main">
            @yield('content')
        </main><!-- End .main -->

        @include('client.layouts.footer')
 
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    @include('client.layouts.mobile-nav')


    <!-- Plugins JS File -->
    <script src="{{asset("assets/js/jquery.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.hoverIntent.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.waypoints.min.js")}}"></script>
    <script src="{{asset("assets/js/superfish.min.js")}}"></script>
    <script src="{{asset("assets/js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-input-spinner.js")}}"></script>
    <script src="{{asset("assets/js/jquery.plugin.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.countdown.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.elevateZoom.min.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Main JS File -->
    <script src="{{asset("assets/js/main.js")}}"></script>
    <script src="{{asset("assets/js/demos/demo-6.js")}}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script>
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: true,
            positionClass: 'toast-top-right',
            preventDuplicates: false,
            onclick: null,
            showDuration: '300',
            hideDuration: '1000',
            timeOut: '2000',
            extendedTimeOut: '1000',
            showEasing: 'swing',
            hideEasing: 'linear',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut'
        };
        @if(session('success'))
            toastr.options.timeOut = 2000;
            toastr.success('{{session('success')}}');
        @elseif(session('error'))
            toastr.options.timeOut = 2000;
            toastr.error('{{session('error')}}');
        @endif
    </script>

    @livewireScripts
    @yield('scripts')
</body>
</html>