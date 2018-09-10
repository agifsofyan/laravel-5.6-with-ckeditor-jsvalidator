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
    <div class="container-fluid">
        @if( $posts->count() )
            @foreach( $posts as $post )
            {{-- <div class="jumbotron"> --}}
                    {{-- <div class="container-fluid"> --}}
                        {{--  <div class="blog-header">
                            <h1 class="blog-title">{{ $post->post_title }}</h1>
                            <p>{{ Helper::get_category( $post->category_ID )->category_name }} / {{ date('M j, Y', strtotime( $post->created_at )) }} <a href="{{ route('posts.edit', $post->id) }}">{Edit}</a></p>
                        </div>  --}}

                        <div class="blog-header" style="border-top: 1px dotted silver; padding-top: 10px;">
                            <h1 class="blog-title blue-text text-center font-weight-bold">{{ $post->post_title }}</h1>

                            <hr>
                            <p class="text-muted text-right">{{ Helper::get_category( $post->category_ID )->category_name }} / {{ date('M j, Y', strtotime( $post->created_at )) }}</p>
                        </div>

                        <div class="row">
                            <div class="col-12 blog-main">

                                {{-- @if( $post->post_thumbnail )
                                    <div class="blog-thumbnail">
                                        <img src="/uploads/{{ $post->post_thumbnail }}" alt="{{ $post->post_title }}" />
                                    </div>
                                @endif --}}

                                <div class="blog-content">
                                    {!! ($post->post_content) !!}
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

                                <hr>
                                <br><br>

                                {{--  <div class="list-group">
                                    <div class="card-header white-text text-center font-weight-bold info-color">Artikel Dikategori Ini</div>
                                    <a href="#" class="list-group-item active waves-light">Cras justo odio</a>
                                        @foreach( $posts as $post )

                                            <a href="/diseases/{{ $post->category_slug}}/{{ $post->post_slug }}" class="list-group-item waves-effect">{{ $post->post_title}}</a>

                                        @endforeach
                                        <div class="d-flex justify-content-center">{{ $posts->render() }}</div>
                                </div>  --}}

                            </div><!-- /.blog-main -->
                        </div>
                    {{-- </div> --}}
                {{-- </div> --}}
            @endforeach
        @endif
    </div>
</div>

@endsection
