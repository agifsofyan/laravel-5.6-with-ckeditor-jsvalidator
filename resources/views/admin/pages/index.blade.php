@extends('admin.main')

@section('title', '| Pages')

@section('content')

    <div class="container">

        {{-- Check if current user is logged-in or a guest --}}
        @if (Auth::guest())

            <p class="mt-5">Who are you ?, please <a href="/login/">login</a> to continue.</p>

        @else

            <div class="blog-header">
                <h1 class="blog-title">Pages <a class="btn btn-sm btn-primary" href="{{ route('pages.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a></h1>
            </div>

            @include('alert.flash-message')

            <div class="row">
                <div class="col-md-12">

                    <table class="table">
                        <tr class="row">
                            <th class="col-2">Title</th>
                            <th class="col-2">Slug</th>
                            <th class="col-2">Content</th>
                            <th class="col-2">Date</th>
                            <th class="col-2">Status</th>
                            <th class="col-2">&nbsp;</th>
                        </tr>
                        <tr>
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
                                                {{ substr( $page->content, 0, 60 ) }} ...
                                            @else
                                                {{ $page->content }}
                                            @endif
                                        </td>
                                        <td class="col-2">Published {{ date( 'j/m/Y', strtotime( $page->created_at ) ) }}</td>
                                        {{-- <td>{{ $page->status }}</td> --}}
                                            @if ($page->status=='published')
                                                <td class="col-2 green-text">{{$page->status}}</td>
                                            @else
                                                <td class="col-2 grey-text">{{$page->status}}</td>
                                            @endif
                                        <td class="col-2">
                                            <form onclick="confirmDelete()" class="d-inline" action="{{ route('pages.destroy', $page->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-sm btn-danger btn-rounded" /><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>

                                            <a class="btn btn-sm btn-info" href="{{ route('pages.edit', $page->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else

                                <tr>
                                    <td colspan="5">No page has been added yet!</td>
                                </tr>

                            @endif
                        </tr>
                    </table>

                    <div class="d-flex justify-content-center">{{ $pages->links() }}</div>

                </div>
            </div>

        @endif

    </div>

@endsection
