@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{-- <strong class="blockquote bq-danger"><small class="text-muted">{{ $message }}</small></strong> --}}
    Please check the form below for errors
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="blockquote bq-danger"><small class="text-muted">{{ $message }}</small></strong>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="blockquote bq-success"><small class="text-muted">{{ $message }}</small></strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong class="blockquote bq-warning"><small class="text-muted">{{ $message }}</small></strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong class="blockquote bq-primary"><small class="text-muted">{{ $message }}</small></strong>
</div>
@endif


{{-- @if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	Please check the form below for errors
</div>
@endif --}}
