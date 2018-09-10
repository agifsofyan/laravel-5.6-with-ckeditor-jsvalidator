@extends('admin.main')

@section('title', '| Klinik Sentosa')

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

            <h6 class="mt-2">dashboard of <strong class="h6-responsive orange-text">{{ ucfirst (Auth::user()->name) }} </strong></h6>

        </div>
    </div>

    <hr>

    <div class="container">
        <div class="col blog-main">
            @if( $posts->count() )
                @foreach( $posts as $post )

                    <div class="blog-post z-depth-1 p-3 mb-4 mt-4">
                        <h2 class="blog-post-title cyan-text">
                            <a href="/diseases/{{ $post->category_slug}}/{{ $post->post_slug }}">{{ $post->post_title }}</a>
                        </h2>
                        {{--  <p class="blog-post-meta">{{ date('M j, Y', strtotime( $post->created_at )) }} by <a href="#">{{ Helper::get_userinfo( $post->author_ID )->name }}</a> <a href="{{ route('posts.edit', $post->id) }}">{Edit}</a></p>  --}}

                        <div class="blog-content">
                            {{--If post content is > 200 in characters display 200 only or else display the whole content--}}
                            <div class="red-text">
                                {!! Helper::words($post->post_content, 70,'....')  !!}
                            </div>
                            <br>
                            <a href="/diseases/{{ $post->category_slug}}/{{ $post->post_slug }}" class="btn btn-outline-info btn-sm float-right">Preview as user</a>

                            <a href="/diseases/{{ $post->category_slug}}" class="green-text float-left pt-2">
                                <h6 class="font-bold pb-1"><i class="fa fa-tag"></i>
                                    {{ Helper::get_category( $post->category_ID )->category_name }}
                                </h6>
                            </a>

                            <br><br>
                            <hr>
                        </div>
                    </div>



                @endforeach

                <div class="d-flex justify-content-center">{{ $posts->render() }}</div>
            @else

                <p>No post martch on your term</p>

            @endif
        </div>
        <!-- /.blog-main -->

        {{-- @include('admin.partials._sidebar') --}}

    </div><!-- /.row -->
    @endif
@endsection
