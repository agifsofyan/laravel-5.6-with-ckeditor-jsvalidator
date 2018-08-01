@if( Helper::get_categories() )
    @foreach( Helper::get_categories() as $cat )
        <li class="nav-item {{ $cat->category_slug == Request::query('category_slug') ? 'active' : '' }}">
            <a class="nav-link waves-effect deas" href="/article/{{ $cat->category_slug}}">{{ $cat->category_name }}
            </a>
        </li>
    @endforeach
@endif

{{--  @if( $posts->count() )
    @foreach( $posts as $post )

    <div class="blog-post">
        <h2 class="blog-post-title">
            <a href="/article/{{ $post->post_slug }}">{{ $post->post_title }}</a>
        </h2>
        <p class="blog-post-meta">{{ date('M j, Y', strtotime( $post->created_at )) }} by
            <a href="#">{{ $post->author_ID }}</a>
        </p>

        <div class="blog-content">
            {!! nl2br( $post->post_content ) !!}
        </div>
    </div>

    @endforeach
@else
    <p>No post added yet!</p>
@endif  --}}
