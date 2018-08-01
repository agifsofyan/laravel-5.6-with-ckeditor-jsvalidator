@extends('main')

@section('title')
@if( $page->count() )
@foreach( $page as $pages )
    | {{ $pages->title }}
@endforeach
@endif
@endsection
@section('content')
<div class="jumbotron">
    <div class="container">
        @if( $page->count() )
            @foreach( $page as $pages )
            <div class="jumbotron">
                    <div class="container">
                        {{--  <div class="blog-header">
                            <h1 class="blog-title">{{ $pages->title }}</h1>
                            <p>{{ Helper::get_category( $pages->category_ID )->category_name }} / {{ date('M j, Y', strtotime( $pages->created_at )) }} <a href="{{ route('page.edit', $pages->id) }}">{Edit}</a></p>
                        </div>  --}}

                        <div class="blog-header">
                            <h1 class="blog-title">{{ $pages->title }}</h1>
                        </div>

                        <div class="row">
                            <div class="col-12 blog-main">

                                <div class="blog-content">
                                    {!! nl2br( $pages->content ) !!}
                                </div><!-- /.blog-pages -->

                            </div><!-- /.blog-main -->
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
