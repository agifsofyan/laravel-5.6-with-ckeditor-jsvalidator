@extends('main')

@section('title', '| Articles')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="blog-header">
                <h1 class="blog-title">Articles</h1>
                <p class="lead blog-description">Klinik Sentosa</p>
            </div>

            <hr>

        @if( $posts->count() )
            @foreach( $posts as $post )

            <div class="card mb-3 text-center">
                <div class="card-body">
                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-4 offset-md-1 mx-3 my-3">
                            <!--Featured image-->
                            <div class="view overlay">
                                {{-- <img src="https://mdbootstrap.com/img/Photos/Others/laptop-sm.jpg" class="img-fluid" alt="Sample image for first version of blog listing"> --}}
                                {{-- <img src=""  :src="'{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name + '.' + file.extension" :alt="file.name"> --}}
                                <img src="/uploads/{{ $post->post_thumbnail }}" alt="{{ $post->post_title }}" class="img-fluid img-thumbnail" />
                                {{--  <img src="/photos/files/{{ $post->post_content }}" alt="{{ $post->post_title }}" class="img-fluid" />  --}}
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-7 text-left ml-3 mt-3">
                            <!--Excerpt-->
                            <a href="/diseases/{{ $post->category_slug}}" class="green-text">
                                <h6 class="font-bold pb-1"><i class="fa fa-tag"></i>
                                    {{-- {{ Helper::get_category( $category->category_name ) }} --}}
                                    {{ Helper::get_category( $post->category_ID )->category_name }}
                                </h6>
                            </a>
                            <hr style="background: #4caf50;">
                            <a href="/diseases/{{ $post->category_slug}}/{{ $post->post_slug }}"><h4 class="mb-4"><strong>{{ $post->post_title }}</strong></h4></a>

                            {!! Helper::words($post->post_content, 70,'... ')  !!}
                            <br>
                            <p class="deep-orange-text">update by <a><strong>
                                {{ Helper::get_userinfo( $post->author_ID )->name }}</strong></a>, {{ date('M j, Y', strtotime( $post->updated_at )) }}
                            </p>
                            <a href="/diseases/{{ $post->category_slug}}/{{ $post->post_slug }}" class="btn btn-success">Read more</a>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </div>
            </div>
            <!--News card-->
            @endforeach

            <div class="d-flex justify-content-center">{{ $posts->render() }}</div>

        @else
            <p>No post added yet!</p>
        @endif
        </div>
    </div>
@endsection
