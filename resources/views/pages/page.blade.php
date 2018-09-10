@extends('main')
@section('title')
@if( $page->count() )
@foreach( $page as $pages )
    | {{ $pages->title }}
@endforeach
@endif
@endsection
@section('content')

{!! nl2br( $pages->content ) !!}

@endsection
