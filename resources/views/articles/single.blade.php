@extends('main')

@section('title')
@if( $posts->count() )
@foreach( $posts as $post )
    | {{ $post->post_title }}
@endforeach
@endif
@endsection
@section('content')
<div class="jumbotron">
    <div class="container">
        @if( $posts->count() )
            @foreach( $posts as $post )
            <div class="jumbotron">
                    <div class="container">
                        {{--  <div class="blog-header">
                            <h1 class="blog-title">{{ $post->post_title }}</h1>
                            <p>{{ Helper::get_category( $post->category_ID )->category_name }} / {{ date('M j, Y', strtotime( $post->created_at )) }} <a href="{{ route('posts.edit', $post->id) }}">{Edit}</a></p>
                        </div>  --}}

                        <div class="blog-header">
                            <h1 class="blog-title">{{ $post->post_title }}</h1>
                            <p>{{ Helper::get_category( $post->category_ID )->category_name }} / {{ date('M j, Y', strtotime( $post->created_at )) }}</p>
                        </div>

                        <div class="row">
                            <div class="col-12 blog-main">

                                {{-- @if( $post->post_thumbnail )
                                    <div class="blog-thumbnail">
                                        <img src="/uploads/{{ $post->post_thumbnail }}" alt="{{ $post->post_title }}" />
                                    </div>
                                @endif --}}

                                <div class="blog-content">
                                    {!! nl2br( $post->post_content ) !!}
                                </div><!-- /.blog-post -->

                                {{-- <section class="mt-5" id="respond"> --}}
                                    {{-- <h2>Comments</h2> --}}

                                    {{--display approved comments--}}
                                    <?php
                                        // echo Helper::get_comments( $post->id );
                                    ?>
                                {{-- </section> --}}

                                {{-- <section class="mt-5" id="comment"> --}}
                                    {{-- display comment form --}}
                                    {{-- @includeIf('comments.form', ['post_id' => $post->id]) --}}
                                {{-- </section> --}}

                            </div><!-- /.blog-main -->
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
