@extends('admin.main')

@section('title')
	| Search on {{ $sa }}
@endsection

@section('content')

    <div class="container">
        <div class="blog-header">
            <h1 class="blog-title">Searching for "{{ $sa }}"</h1>
            <p>We ve found {{ $posts->count() }} results for your search term in all blog entries</p>
        </div>

        <div class="row">
            <div class="col-12 blog-main">

                @if( $posts->count() )
                    @foreach( $posts as $post )

                        <div class="blog-post">
                            <h2 class="blog-post-title cyan-text">
                                <a href="/diseases/{{ $post->category_slug}}/{{ $post->post_slug }}" class="disabled">{{ $post->post_title }}</a>
                            </h2>
                            <p class="blog-post-meta">{{ date('M j, Y', strtotime( $post->created_at )) }} by <a href="#">{{ Helper::get_userinfo( $post->author_ID )->name }}</a> <a href="{{ route('posts.edit', $post->id) }}">{Edit}</a></p>

                            <div class="blog-content">
                                {{--If post content is > 200 in characters display 200 only or else display the whole content--}}
                                {{ strlen( $post->post_content ) > 200 ? substr( $post->post_content, 0, 200) . ' ...' : $post->post_content }}
                                <a href="/diseases/{{ $post->category_slug}}/{{ $post->post_slug }}" class="btn btn-outline-info btn-sm">Preview as user</a>
                                <br><hr>
                            </div>
                        </div>

                    @endforeach
                @else

                    <p>No post martch on your term <strong>{{ $sa }}</strong></p>

                @endif

                {{-- Display pagination only if more than the required pagination --}}
                @if( $posts->total() > 6 )
                    <nav>
                        <ul class="pager">
                            @if( $posts->firstItem() > 1 )
                                <li><a href="{{ $posts->previousPageUrl() }}">Previous</a></li>
                            @endif

                            @if( $posts->lastItem() < $posts->total() )
                                <li><a href="{{ $posts->nextPageUrl() }}">Next</a></li>
                            @endif
                        </ul>
                    </nav>
                @endif

            </div>
        </div>
    </div>

@endsection
