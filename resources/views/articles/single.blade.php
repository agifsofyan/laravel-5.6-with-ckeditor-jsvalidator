@extends('main')

@section('title')
@if( $posts->count() )
@foreach( $posts as $post )
    | {{ $post->post_title }}
@endforeach
@endif
@endsection
@section('content')
<div class="jumbotron" style="margin-bottom: 0;">
    <div class="container-fluid">
        @if( $posts->count() )
            @foreach( $posts as $post )
            {{-- <div class="jumbotron"> --}}
                    {{-- <div class="container-fluid"> --}}
                        {{--  <div class="blog-header">
                            <h1 class="blog-title">{{ $post->post_title }}</h1>
                            <p>{{ Helper::get_category( $post->category_ID )->category_name }} / {{ date('M j, Y', strtotime( $post->created_at )) }} <a href="{{ route('posts.edit', $post->id) }}">{Edit}</a></p>
                        </div>  --}}

                        <div class="blog-header" style="border-top: 1px dotted silver; padding-top: 10px;">
                            <h1 class="blog-title blue-text text-center font-weight-bold">{{ $post->post_title }}</h1>

                            <hr>
                            <p class="text-muted text-right">{{ Helper::get_category( $post->category_ID )->category_name }} / {{ date('M j, Y', strtotime( $post->created_at )) }}</p>
                        </div>

                        <div class="row">
                            <div class="col-12 blog-main">

                                {{-- @if( $post->post_thumbnail )
                                    <div class="blog-thumbnail">
                                        <img src="/uploads/{{ $post->post_thumbnail }}" alt="{{ $post->post_title }}" />
                                    </div>
                                @endif --}}

                                <div class="blog-content">
                                    {!! ($post->post_content) !!}
                                </div><!-- /.blog-post -->

                                {{-- <section class="mt-5" id="respond"> --}}
                                    {{-- <h2>Comments</h2> --}}

                                    {{--display approved comments--}}
                                    <?php
                                        // echo Helper::get_comments( $post->id );
                                    ?>
                                {{-- </section> --}}

                                {{-- <section class="mt-5" id="comment"> --}}
                                    {{-- display comment form --}}
                                    {{-- @includeIf('comments.form', ['post_id' => $post->id]) --}}
                                {{-- </section> --}}

                                <hr>
                                <br><br>

                                {{--  <div class="list-group">
                                    <div class="card-header white-text text-center font-weight-bold info-color">Artikel Dikategori Ini</div>
                                    <a href="#" class="list-group-item active waves-light">Cras justo odio</a>
                                        @foreach( $posts as $post )

                                            <a href="/diseases/{{ $post->category_slug}}/{{ $post->post_slug }}" class="list-group-item waves-effect">{{ $post->post_title}}</a>

                                        @endforeach
                                        <div class="d-flex justify-content-center">{{ $posts->render() }}</div>
                                </div>  --}}

                            </div><!-- /.blog-main -->
                        </div>
                    {{-- </div> --}}
                {{-- </div> --}}
            @endforeach
        @endif
    </div>
</div>

 <style>
    .view img{
        border-radius: 50%;
    }

    .view:hover img{
        border-radius: 0 !important;
        transition: all 1s ease-in-out;
        -webkit-transform: rotateZ(-360deg);
        -ms-transform: rotateZ(-360deg);
        transform: rotateZ(-360deg);
    }

    .clip:hover{
        color: gold !important;
        border: 2px solid gold !important;
    }
</style>
    
<div class="jumbotron" style="padding-top: 10px; margin-top: 0; background-color: rgba(62, 69, 81, 0.9);">
    <h2 class="white-text text-center font-weight-bold" style="padding: 20px;">Artikel Terkait</h2>
    <hr style="background: white;">
    <!--Accordion wrapper-->
    <div class="container">
        <div class="accordion sm-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
            @if( Helper::getArticleList() )
            @foreach( Helper::getArticleList() as $artList )
                <!-- Accordion card -->
                <div class="list-group">

                    <!-- Card header -->
                    <div class="card-header btn btn-outline-warning waves-effect or-title" role="tab" id="heading{{ $artList->id }}" style="width: 100%;">
                        <a data-toggle="collapse" data-parent="#accordionEx" href="#{{ $artList->post_slug }}" aria-expanded="false" aria-controls="collapse{{ $artList->id }}">
                            <h6 class="mb-0">
                                <b class="orange-text">{{ $artList->post_title }}</b> <i class="fa fa-angle-down rotate-icon white-text" style="float: right;"></i>
                            </h6>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="{{ $artList->post_slug }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $artList->id }}" data-parent="#accordionEx" style="border: 1px solid white; border-radius: 20px; background-color: rgba(3, 169, 244, 0.1)">
                        <div class="card-body white-text">
                            <div class="media d-block d-md-flex mt-4">
                                <div class="view overlay zoom">
                                    <img class="d-flex mb-3 mx-auto media-image avatar-2 z-depth-2 img-fluid" src="/uploads/{{ $artList->post_thumbnail }}" alt="{{ $artList->post_title }}" />
                                    <div class="mask flex-center waves-effect waves-light">
                                        <p class="white-text">{{ $artList->post_title }}</p>
                                    </div>
                                </div>
                                <br>
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <h5 class="mt-0 font-weight-bold">{{ $artList->post_title }}</h5>
                                    {!! Helper::words($artList->post_content, 70,"... ")  !!}
                                </div>
                            </div>
                
                            <br/>
                            <a href="/diseases/{{ $artList->category_slug}}/{{ $artList->post_slug }}" class="btn btn-outline-warning btn-rounded waves-effect btn-sm clip" style="float: right; margin-right: -40px; margin-top: -30px;">Read more</a>
                        </div>

                    </div>
                    <!-- Accordion card -->

                </div>
                <!-- Accordion wrapper -->

            @endforeach
            @endif
        
        </div>

    </div>
</div>

@endsection
