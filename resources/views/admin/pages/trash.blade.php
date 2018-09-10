@extends('admin.main')

@section('title', '| Pages')

@section('content')

	<div class="container">

		{{-- Check if current user is logged-in or a guest --}}
		@if (Auth::guest())

			<p class="mt-5">Who are you ?, please <a href="/login/">login</a> to continue.</p>

		@else

            <div class="blog-header row">
                <div class="col-6">
                    <h1 class="blog-title">Trash <a href="{{ route('pages.create') }}"></a></h1>
                </div>
                <div class="col-6 text-right">
                    @if(count($pages))
                        <h1 class="blog-title"><a href="{{ route('pages.index') }}" class="btn btn-sm btn-grey">
                            <i class="fa fa-file"></i>
                            <small>pages</small>
                            <span class="badge blue">{{count($pages)}}</span>
                        </a></h1>
                    @endif
                </div>
            </div>

            @include('alert.flash-message')

			<div class="container-fluid">
				<section>
					<table id="myTables" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr class="row rgba-black-strong white-text table-bordered">
                                <th class="col-2 th-sm">Title
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-2 th-sm">Slug
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-2 th-sm">Content
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-2 th-sm">Date
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-2 th-sm">Status
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-2 th-sm">Action
                                    {{-- <i class="fa fa-sort float-right" aria-hidden="true"></i> --}}
                                </th>
                            </tr>
                        </thead>
						<tbody>
							{{-- Blade if and else --}}
							@if(count($pagesTrash) )
								{{-- Blade foreach --}}
								@foreach( $pagesTrash as $post )
									<tr class="row">
										<td class="col-2">
											<strong>
                                                {{ $post->title }}
											</strong>
										</td>
										<td class="col-2">{{ $post->slug }}</td>
										<td class="col-2">
											@if ( strlen( $post->content ) > 60 )
                                                <small>{!! Helper::words($post->content, 15)  !!}</small>
											@else
                                                <small>{!! Helper::words($post->content, 5)  !!}</small>
											@endif
										</td>
										<td class="col-2s">
											<a href="#" class="teal-text">
												{{ $post->status }}
											</a>
                                        </td>
                                        {{-- <td>
                                            <a href="#">
                                                {{ $post->post_type }}
                                            </a>
                                        </td> --}}

										<td class="col-2">{{ date( 'j/m/Y', strtotime( $post->created_at ) ) }}</td>
										<td class="col-2">
                                            <div class="row">
                                            	<div class="col-6">
                                                    <a href="{{ route('pages.restore', $post->id) }}" class="btn btn-sm btn-info restore" data-postTitle="{{ $post->title }}" data-postId="{{ $post->id }}"><i class="fa fa-recycle"></i></a>
                                                </div>

                                                <div class="col-6">
                                                        <a href="{{ route('pages.forceDelete', $post->id) }}" type="submit" class="btn btn-sm btn-danger force" data-forceTitle="{{ $post->title }}" data-forceId="{{ $post->id }}"><i class="fa fa-times" aria-hidden="true"></i> </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                                {{-- <div class="d-flex justify-content-center">{{ $pagesTrash->render() }}</div> --}}

							@else

                                <tr>
                                    <td colspan="5">No post has been added yet!</td>
                                </tr>

                            @endif
						</tbody>
					</table>
				</section>
            </div>

            <div class="d-flex justify-content-center">{{ $pagesTrash->render() }}</div>

		@endif
    </div>

@include('alert.confirm')

@endsection
