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
    <link rel="stylesheet" href="{{ asset('css/datatable/datatable.min.css') }}">
    {{--  CK Editor  --}}
    <link href="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.css">
    {{-- Toast --}}
    @toastr_css
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
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables/datatables.min.js')}}"></script>
    {{--  Confirmation  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.min.js"></script>
    {{--  CKEditor  --}}
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    {{-- Toast --}}
    @toastr_js
    @toastr_render

    @include('alert.validator')
    @include('alert.confirm')

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
            $(document).ready(function () {
                $('#myTables').DataTable();
                $('#myTables_wrapper').find('label').each(function () {
                  $(this).parent().append($(this).children());
                });
                $('#myTables_wrapper .dataTables_filter').find('input').each(function () {
                  $('input').attr("placeholder", "Search");
                  $('input').removeClass('form-control-sm');
                });
                $('#myTables_wrapper .dataTables_length').addClass('d-flex').find('label').addClass('teal-text mr-3 mt-3 text-fluid');
                $('#myTables_wrapper .dataTables_filter').addClass('md-form m-2');
                $('#myTables_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
                $('#myTables_wrapper select').addClass('mdb-select');
                $('#myTables_wrapper .mdb-select').material_select();
                $('#myTables_wrapper .dataTables_filter').find('label').remove();
                $('#myTables_wrapper .dataTables_info').addClass('teal-text');
                $('#myTables_wrapper .row');
              });
    </script>
</body>
</html>
