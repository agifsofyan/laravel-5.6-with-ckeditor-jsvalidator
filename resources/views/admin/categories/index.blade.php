@extends('admin.main')

@section('title', '| Categories')

@section('content')

	<div class="container">

		{{-- Check if current user is logged-in or a guest --}}
		@if (Auth::guest())

			<p class="mt-5">Who are you ?, please <a href="/login/">login</a> to continue.</p>

		@else

            <div class="blog-header row">
                <div class="col-6">
                    <h1 class="blog-title">Categories <a class="btn btn-sm btn-primary" href="{{ route('categories.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a></h1>
                </div>
                <div class="col-6 text-right">
                    @if(count($catsTrash))
                        <h1 class="blog-title"><a href="{{ route('categories.trash') }}" class="btn btn-sm btn-brown">
                            <i class="fa fa-trash"></i>
                            <small>Trash</small>
                            <span class="badge blue">{{count($catsTrash)}}</span>
                        </a></h1>
                    @endif
                </div>
            </div>

            @include('alert.toast')

			<div class="container-fluid">
				<section>
					<table id="myTables" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr class="row unique-color white-text table-bordered">
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
							@if( $categories->count() )
								{{-- Blade foreach --}}
								@foreach( $categories as $cat )
									<tr class="row">
										<td class="col-3">
											<strong>
												<a href="{{ route('categories.edit', $cat->id) }}">
													{{ $cat->category_name }}
												</a>
											</strong>
                                        </td>
                                        <td class="col-3">
                                            {{ $cat->category_slug }}
                                        </td>
										<td class="col-3">Published {{ date( 'j/m/Y', strtotime( $cat->created_at ) ) }}</td>
										<td class="col-3">
											<div class="row">
                                                <div class="col-6">
                                                        {{ Form::open(array(
                                                            'action' => ['CategoriesController@destroy', $cat->id],
                                                            'method' => 'DELETE',
                                                            'id'     => $cat->id,
                                                            'style'  => 'display-inline'
                                                        )) }}

                                                        <a class="btn btn-sm btn-danger delete" type="button" data-postTitle="{{ $cat->category_name }}" data-postId="{{ $cat->id }}"><i class="fa fa-trash"></i></a>

                                                         {{ Form::close() }}
                                                    </div>
                                                    <div class="col-6">
                                                        <a class="btn btn-sm btn-info" href="{{ route('posts.edit', $cat->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    </div>
											</div>
                                        </td>
									</tr>
                                @endforeach
                            @else

                                <tr>
                                    <td colspan="5">No category has been added yet!</td>
                                </tr>

							@endif
						</tbody>
					</table>

                    {{-- <div class="d-flex justify-content-center">{{ $categories->links() }}</div> --}}

				</section>
			</div>

		@endif
	</div>
@endsection
