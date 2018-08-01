@extends('admin.main')

@section('title')
    | {{ $page->post_title }}
@endsection

@section('content')

    {{-- Check if current user is logged-in or a guest --}}
	@if (Auth::guest())

        <p class="mt-5">Who are you ?, please <a href="/login/">login</a> to continue.</p>

    @else

    <div class="blog-header">
        <h1 class="blog-title">{{ $page->post_title }}</h1>
        <p>{{ date('M j, Y', strtotime( $page->created_at )) }} <a href="{{ route('posts.edit', $page->id) }}">{Edit}</a></p>
    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">

            <div class="blog-content">
                {!! nl2br( $page->post_content ) !!}
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        Pages

        <!--Sidebar-->
        {{-- @include('admin.partials._sidebar') --}}
    </div><!-- /.row -->

    @endif

@endsection
