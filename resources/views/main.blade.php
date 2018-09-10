<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS --></#comment>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    {{-- Toast --}}
    @toastr_css
    <!-- Custom -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    {{-- analytic google --}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123742553-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-123742553-1');
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

<footer class="page-footer font-small pt-4" style="background-color: #54b0d5;">
    @include('partials._footer')
</footer>

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
{{-- Toast --}}
@toastr_js
@toastr_render

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

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
    // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</body>
</html>
