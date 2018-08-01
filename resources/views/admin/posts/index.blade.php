@extends('admin.main')

@section('title', '| Posts')

@section('content')

	<div class="container">

		{{-- Check if current user is logged-in or a guest --}}
		@if (Auth::guest())

			<p class="mt-5">Who are you ?, please <a href="/login/">login</a> to continue.</p>

		@else

			<div class="blog-header">
		        <h1 class="blog-title">Posts <a class="btn btn-sm btn-primary" href="{{ route('posts.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a></h1>
            </div>

            @include('alert.flash-message')

			<div class="row">
				<div class="col-md-12">

					<table class="table">
						<tr class="row">
							<th class="col-2">Title</th>
							<th class="col-1">Author</th>
							<th class="col-3">Content</th>
                            <th class="col-2">Category</th>
                            <th class="col-2">Date</th>
							<th class="col-2">&nbsp;</th>
						</tr>
						<tr>
							{{-- Blade if and else --}}
							@if( $posts->count() )
								{{-- Blade foreach --}}
								@foreach( $posts as $post )
									<tr class="row">
										<td class="col-2">
											<strong>
												<a href="{{ route('posts.edit', $post->id) }}">
													{{ $post->post_title }}
												</a>
											</strong>
										</td>
										<td class="col-1 pl-4">{{ $post->author_ID }}</td>
										<td class="col-3">
											@if ( strlen( $post->post_content ) > 60 )
												{{ substr( $post->post_content, 0, 60 ) }} ...
											@else
												{{ $post->post_content }}
											@endif
										</td>
										<td class="col-1 pl-4">
											<a href="#" style="background: skyblue; color: brown; border-radius: 30%; padding: 0 5px;">
												{{ $post->category_ID }}
											</a>
                                        </td>
                                        {{-- <td>
                                            <a href="#">
                                                {{ $post->post_type }}
                                            </a>
                                        </td> --}}
										<td class="col-2">Published {{ date( 'j/m/Y', strtotime( $post->created_at ) ) }}</td>
										<td class="col-2">
                                            <form onclick="confirmDelete()" class="d-inline delete" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-sm btn-danger" /><i class="fa fa-trash" aria-hidden="true"></i> </button>
                                            </form>

                                            <a class="btn btn-sm btn-info" href="{{ route('posts.edit', $post->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
									</tr>
								@endforeach
							@else

                                <tr>
                                    <td colspan="5">No post has been added yet!</td>
                                </tr>

                            @endif
						</tr>
					</table>

                    <div class="d-flex justify-content-center">{{ $posts->render() }}</div>

				</div>
            </div>
		@endif
    </div>
@endsection
