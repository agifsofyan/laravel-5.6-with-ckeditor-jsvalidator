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
                    <h1 class="blog-title">Posts <a class="btn btn-sm btn-primary" href="{{ route('posts.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a></h1>
                </div>
                <div class="col-6 text-right">
                    @if(count($postsTrash))
                        <h1 class="blog-title"><a href="{{ route('posts.trash') }}" class="btn btn-sm btn-brown">
                            <i class="fa fa-trash"></i>
                            <small>Trash</small>
                            <span class="badge blue">{{count($postsTrash)}}</span>
                        </a></h1>
                    @endif
                </div>
            </div>

            <hr>

            @include('alert.flash-message')

			<div class="container-fluid">
				<section>
					<table id="myTables" class="table" cellspacing="0" width="100%">
						<thead>
                            <tr class="row unique-color white-text table-bordered">
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
                                        <td class="col-2">{{ date( 'j/m/Y', strtotime( $post->created_at ) ) }}
                                        </td>
                                        <td class="col-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    {{ Form::open(array(
                                                        'action' => ['PostsController@destroy', $post->id],
                                                        'method' => 'DELETE',
                                                        'id'     => $post->id,
                                                        'style'  => 'display-inline'
                                                    )) }}

                                                    <a class="btn btn-sm btn-danger delete" type="button" data-postTitle="{{ $post->post_title }}" data-postId="{{ $post->id }}"><i class="fa fa-trash"></i></a>

                                                    {{ Form::close() }}
                                                </div>
                                                <div class="col-6">
                                                    <a class="btn btn-sm btn-info" href="{{ route('posts.edit', $post->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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

            {{-- <div class="d-flex justify-content-center">{{ $posts->links() }}</div> --}}

		@endif
    </div>

@endsection
