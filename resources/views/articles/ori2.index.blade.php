@extends('main')

@section('title', '| Articles')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="blog-header">
                <h1 class="blog-title">Articles</h1>
                <p class="lead blog-description">Klinik Sentosa</p>
            </div>

            <hr>

            @if( $posts->count() )
                @foreach( $posts as $post )

                    <div class="blog-post">
                        <h2 class="blog-post-title">
                            <a href="/article/{{ $post->post_slug }}">{{ $post->post_title }}</a>
                        </h2>
                        <p class="blog-post-meta">{{ date('M j, Y', strtotime( $post->created_at )) }} by <a href="#">{{ $post->author_ID }}</a></p>

                        <div class="blog-content">
                            {!! nl2br( $post->post_content ) !!}
                        </div>
                    </div>

                @endforeach



                <div class="d-flex justify-content-center">{{ $posts->render() }}</div>

            @else

                <p>No post added yet!</p>

            @endif
        </div>
    </div>
@endsection
