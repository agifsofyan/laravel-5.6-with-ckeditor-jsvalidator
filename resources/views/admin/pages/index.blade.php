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
                    <h1 class="blog-title">Pages <a class="btn btn-sm btn-primary" href="{{ route('pages.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a></h1>
                </div>
                <div class="col-6 text-right">
                    @if(count($pagesTrash))
                        <h1 class="blog-title"><a href="{{ route('pages.trash') }}" class="btn btn-sm btn-brown">
                            <i class="fa fa-trash"></i>
                            <small>Trash</small>
                            <span class="badge blue">{{count($pagesTrash)}}</span>
                        </a></h1>
                    @endif
                </div>
            </div>

            @include('alert.flash-message')

            <div class="container-fluid ">
                <section>
                    <table id="myTables" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr class="row unique-color white-text table-bordered">
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
                            @if( $pages->count() )
                                {{-- Blade foreach --}}
                                @foreach( $pages as $page )
                                    <tr class="row">
                                        <td class="col-2">
                                            <strong>
                                                <a href="{{ route('pages.edit', $page->id) }}">
                                                    {{ $page->title }}
                                                </a>
                                            </strong>
                                        </td>
                                        <td class="col-2">{{ $page->slug }}</td>
                                        <td class="col-2">
                                            @if ( strlen( $page->content ) > 60 )
                                                <small>{!! Helper::words($page->content, 20)  !!}</small>
                                            @else
                                                <small>{!! Helper::words($page->content, 20)  !!}</small>
                                            @endif
                                        </td>
                                        <td class="col-2">{{ date( 'j/m/Y', strtotime( $page->created_at ) ) }}</td>
                                        {{-- <td>{{ $page->status }}</td> --}}
                                            @if ($page->status=='published')
                                                <td class="col-2 green-text">{{$page->status}}</td>
                                            @else
                                                <td class="col-2 grey-text">{{$page->status}}</td>
                                            @endif

                                        <td class="col-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    {{ Form::open(array(
                                                        'action' => ['PagesController@destroy', $page->id],
                                                        'method' => 'DELETE',
                                                        'id'     => $page->id,
                                                        'style'  => 'display-inline'
                                                    )) }}

                                                    <a class="btn btn-sm btn-danger delete" type="button" data-postTitle="{{ $page->title }}" data-postId="{{ $page->id }}"><i class="fa fa-trash"></i></a>

                                                     {{ Form::close() }}
                                                </div>
                                                <div class="col-6">
                                                    <a class="btn btn-sm btn-info" href="{{ route('pages.edit', $page->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else

                                <tr>
                                    <td colspan="5">No page has been added yet!</td>
                                </tr>

                            @endif
                        </tbody>
                    </table>

                    {{-- <div class="d-flex justify-content-center">{{ $pages->links() }}</div> --}}

                </section>
            </div>

        @endif
    </div>
@endsection
