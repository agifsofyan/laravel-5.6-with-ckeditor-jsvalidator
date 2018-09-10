@extends('admin.main')

@section('title', '| Posts')

@section('content')

	<div class="container">

		{{-- Check if current user is logged-in or a guest --}}
		@if (Auth::guest())

			<p class="mt-5">Who are you ?, please <a href="/login/">login</a> to continue.</p>

		@else

            <div class="blog-header row">
                <div class="col-6">
                    <h1 class="blog-title">Trash <a href="{{ route('posts.create') }}"></a></h1>
                </div>
                <div class="col-6 text-right">
                    @if(count($posts))
                        <h1 class="blog-title"><a href="{{ route('posts.index') }}" class="btn btn-sm btn-grey">
                            <i class="fa fa-file"></i>
                            <small>Posts</small>
                            <span class="badge blue">{{count($posts)}}</span>
                        </a></h1>
                    @endif
                </div>
            </div>

            @include('alert.flash-message')

			<div class="container-fluid">
				<section>
					<table id="myTables" class="table" cellspacing="0" width="100%">
						<thead>
                            <tr class="row rgba-black-strong table-bordered white-text">
                                <th class="col-2 th-sm">Title
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-2 th-sm">Author
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-2 th-sm">Content
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-2 th-sm">Category
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-2 th-sm">Date
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-2 th-sm">Action
                                    {{-- <i class="fa fa-sort float-right" aria-hidden="true"></i> --}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
						{{-- Blade if and else --}}
						@if(count($postsTrash) )
							{{-- Blade foreach --}}
							@foreach( $postsTrash as $post )
								<tr class="row">
									<td class="col-2">
										<strong>
                                            {{ $post->post_title }}
										</strong>
									</td>
									<td class="col-2 pl-4">{{ $post->author_ID }}</td>
									<td class="col-2">
										@if ( strlen( $post->post_content ) > 60 )
                                            <small>{!! Helper::words($post->post_content, 15)  !!}</small>
										@else
                                            <small>{!! Helper::words($post->post_content, 5)  !!}</small>
										@endif
									</td>
									<td class="col-2 pl-4">
										<a href="#" class="teal-text">
											{{ $post->category_ID }}
										</a>
                                    </td>
    								<td class="col-2">{{ date( 'j/m/Y', strtotime( $post->created_at ) ) }}</td>
									<td class="col-2">
                                        <div class="row">
                                          	<div class="col-6">
                                                <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-sm btn-info restore" data-postTitle="{{ $post->post_title }}" data-postId="{{ $post->id }}"><i class="fa fa-recycle"></i></a>
                                            </div>

                                            <div class="col-6">
                                                <a href="{{ route('posts.forceDelete', $post->id) }}" type="submit" class="btn btn-sm btn-danger force" data-forceTitle="{{ $post->post_title }}" data-forceId="{{ $post->id }}"><i class="fa fa-times" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            {{-- <div class="d-flex justify-content-center">{{ $postsTrash->render() }}</div> --}}

    					@else

                            <tr>
                                <td colspan="5">No post has been added yet!</td>
                            </tr>

                        @endif
                        </tbody>
					</table>
				</section>
            </div>

            {{-- <div class="d-flex justify-content-center">{{ $postsTrash->render() }}</div> --}}

		@endif
    </div>

@include('alert.confirm')

@endsection
