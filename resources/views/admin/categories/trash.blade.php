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
                    <h1 class="blog-title">Trash <a href="{{ route('categories.create') }}"></a></h1>
                </div>
                <div class="col-6 text-right">
                    @if(count($categories))
                        <h1 class="blog-title"><a href="{{ route('categories.index') }}" class="btn btn-sm btn-grey">
                            <i class="fa fa-file"></i>
                            <small>Categories</small>
                            <span class="badge blue">{{count($categories)}}</span>
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
                                <th class="col-3 th-sm">Title
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-3 th-sm">Slug
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-3 th-sm">Date
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="col-3 th-sm">Action
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                            </tr>
                        </thead>
						<tbody>
							{{-- Blade if and else --}}
							@if(count($catsTrash) )
								{{-- Blade foreach --}}
								@foreach( $catsTrash as $cat )
									<tr class="row">
										<td class="col-3">
											<strong>
                                                {{ $cat->category_name }}
											</strong>
										</td>
										<td class="col-3">{{ $cat->category_slug }}</td>

										<td class="col-3">{{ date( 'j/m/Y', strtotime( $cat->created_at ) ) }}</td>
										<td class="col-3">
                                            <div class="row">
                                            	<div class="col-6">
                                                    <a href="{{ route('categories.restore', $cat->id) }}" class="btn btn-sm btn-info restore" data-postTitle="{{ $cat->category_name }}" data-postId="{{ $cat->id }}"><i class="fa fa-recycle"></i></a>
                                                </div>

                                                <div class="col-6">
                                                    <a href="{{ route('categories.forceDelete', $cat->id) }}" type="submit" class="btn btn-sm btn-danger force" data-forceTitle="{{ $cat->category_name }}" data-forceId="{{ $cat->id }}"><i class="fa fa-times" aria-hidden="true"></i> </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
							@else

                                <tr>
                                    <td colspan="5">No post has been added yet!</td>
                                </tr>

                            @endif
						</tbody>
					</table>
				</section>
            </div>

            {{-- <div class="d-flex justify-content-center">{{ $catsTrash->render() }}</div> --}}

		@endif
    </div>

@include('alert.confirm')

@endsection
