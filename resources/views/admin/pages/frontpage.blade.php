@extends('admin.main')

@section('title', '| Blog Tutorial')

@section('content')

    {{-- Check if current user is logged-in or a guest --}}
	@if (Auth::guest())

        <div class="blog-header">
            <h1 class="blog-title">Welcome</h1>
        </div>
        <p class="mt-5">Who are you ?, please <a href="/login/">login</a> to continue.</p>

    @else

    @include('alert.flash-message')

    <div class="card-header" style="background-color: #7788DD; color: white">
        <div class="col blog-main">

            {{-- Hello, {{ ucfirst (Auth::user()->name) }} you made it into your dashboard --}}

            {{ ucfirst (Auth::user()->name) }} dashboard

        </div>
    </div>

    <hr>

    <div class="container">
        <div class="col blog-main">
            @if( $posts->count() )
                @foreach( $posts as $post )

                    <div class="blog-post">
                        <h2 class="blog-post-title cyan-text">
                            <a href="/disease/{{ $post->category_ID }}/{{ $post->id }}">{{ $post->post_title }}</a>
                        </h2>
                        <p class="blog-post-meta">{{ date('M j, Y', strtotime( $post->created_at )) }} by <a href="#">{{ Helper::get_userinfo( $post->author_ID )->name }}</a> <a href="{{ route('posts.edit', $post->id) }}">{Edit}</a></p>

                        <div class="blog-content">
                            {{--If post content is > 200 in characters display 200 only or else display the whole content--}}
                            {{ strlen( $post->post_content ) > 200 ? substr( $post->post_content, 0, 200) . ' ...' : $post->post_content }}
                            <a href="/disease/{{ $post->category_ID }}/{{ $post->id }}" class="btn btn-outline-info btn-sm">Preview as user</a>
                            <br><hr>
                        </div>
                    </div>

                @endforeach

                <div class="d-flex justify-content-center">{{ $posts->render() }}</div>
            @else

                <p>No post martch on your term <strong>{{ $sa }}</strong></p>

            @endif
        </div>
        <!-- /.blog-main -->

        {{-- @include('admin.partials._sidebar') --}}

    </div><!-- /.row -->
    @endif
@endsection
