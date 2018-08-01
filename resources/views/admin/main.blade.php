<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    {{--  CK Editor  --}}
    <link href="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>

    @include('admin.partials._header')

    {{-- <div class="container-fluid"> --}}
        <div class="card">
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    {{-- </div> --}}

    @include('admin.partials._footer')

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    {{--  Confirmation  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    {{--  CKEditor  --}}
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    @include('alert.validator')
</body>
</html>
