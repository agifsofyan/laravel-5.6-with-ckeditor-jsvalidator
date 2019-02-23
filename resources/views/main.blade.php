<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="yandex-verification" content="49b5797fc36c6ef5" />
    <meta name="msvalidate.01" content="6B415FEB929F6FF40BA419BD8A8B33A0" />
    <title>{{ config('app.name') }} @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/css/mdb.min.css" rel="stylesheet"> -->
    <link href="{{asset('css/custom-mdb.min.css')}}" rel="stylesheet">
    @toastr_css
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127396657-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-127396657-1');
    </script>

</head>
{{-- <body style="left: 0; right: 0; margin-bottom: 20%; padding: 0; background-color: #54b0d5;"> --}}
<body style="left: 0; right: 0; padding: 0; background-color: #54b0d5;">

<header>
    @include('partials._header')
</header>

<main class="white">
    @yield('content')
</main>

<footer class="page-footer font-small pt-4" style="background-color: #54b0d5; margin-bottom: -21px !important;">
    @include('partials._footer')
</footer>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/js/mdb.min.js"></script> -->

<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
@toastr_js
@toastr_render

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\SiteRequest', '#save-user') !!}

<script>
    $('#form').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
          echo 'oke';
        } else {
          print "off"
        }
      })
</script>

<script src="{{asset('js/style.js')}}"></script>

<script src="{{asset('js/twd-menu.js')}}"></script>
<script>
    $('.multi-item-example').carousel({
      interval: 4000
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#carousel-example-1z').hammer().on('swipeleft', function () {
            $(this).carousel('next');
        })
        $('#carousel-example-1z').hammer().on('swiperight', function () {
            $(this).carousel('prev');
        })
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#multi-item-example').hammer().on('swipeleft', function () {
            $(this).carousel('next');
        })
        $('#multi-item-example').hammer().on('swiperight', function () {
            $(this).carousel('prev');
        })
    });
</script>

<script type="text/javascript">
    function myChat() {
    window.open("https://mqa.zoosnet.net/LR/Chatpre.aspx?id=MQA87261512&lng=en" ,"_blank");
}
</script>

<script>
    $(".button-collapse").sideNav();
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->

</body>
</html>
