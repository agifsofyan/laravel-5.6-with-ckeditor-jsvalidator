@extends('admin.main')

@section('title', '| Add New Post')

@section('content')

	<div class="container">

		{{-- Check if current user is logged-in or a guest --}}
		@if (Auth::guest())

			<p class="mt-5">Who are you ?, please <a href="/login/">login</a> to continue.</p>

        @else

        @include('alert.flash-message')

			<div class="blog-header">
		        <h1 class="blog-title">{{ $post->post_title }}</h1>
		        <p>{{ Helper::get_category( $post->category_ID )->category_name }} / {{ date('M j, Y', strtotime( $post->created_at )) }} <a href="{{ route('posts.edit', $post->id) }}">{Edit}</a></p>
		    </div>

			<div class="row">
				<div class="col-sm-12 blog-main">

					<div class="blog-thumbnail text-center">
						<img src="/uploads/{{ $post->post_thumbnail }}" alt="{{ $post->post_thumbnail }}" data-toggle="tooltip" data-placement="bottom" title="Image thumbnail" class="img-fluid img-thumbnail z-depth-3" />
                    </div>

                    <hr>

					<div class="blog-content">
						{{-- Inserts HTML line breaks before all newlines in a string --}}
						{!! nl2br( $post->post_content ) !!}
					</div>

				</div>
			</div>

		@endif

	</div>

@endsection
