@extends('main')
    @section('title', '| Home')
    @section('content')

    @include('alert.flash-message')

    <link href="{{ asset('css/hover-button.min.css') }}" rel="stylesheet">

    {{--  <main class="white">  --}}
        <!-- carousel -->
        <!--Carousel Wrapper-->
        <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-1" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                <!--First slide-->
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('img/slider/slideshow-1.jpg')}}" alt="First slide Klinik Sentosa">
                </div>
                <!--/First slide-->
                <!--Second slide-->
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img/slider/slideshow-2.jpg')}}" alt="Second slide Klinik Sentosa">
                </div>
                <!--/Second slide-->
                <!--Third slide-->
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img/slider/slideshow-3.jpg')}}" alt="Third slide Klinik Sentosa">
                </div>
                <!--/Third slide-->
            </div>
            <!--/.Slides-->
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
        </div>
        <!--/.Carousel Wrapper-->

        <div class="container-fluid">
            <div class="row">
                <ul class="col-4 animate ca-menu pl-2 pr-1">
                    <li>
                        <a href="#" class="text-center">
                            <hr style="background-color: lightskyblue; height: 3px;">
                            <div class="ca-conten">
                                <h4 class="h4-responsive font-weight-bold ca-main"><strong>Jam Buka</strong></h4>
                                <span class="ca-icon">&#80;</span>
                                <h5 style="color: cornflowerblue" class="h5-responsive"><strong>Setiap Hari</strong></h5>
                                <h5 class="h5-responsive orange-text text-fluid ca-sub">09.00 - 21.00 wib</h5>
                                <p class="text-fluid ca-sub">Hari libur tetap buka</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="col-4 ca-menu pl-1 pr-1">
                    <li>
                        <a href="#" class="text-center">
                            <hr style="background-color: lightskyblue; height: 3px;">
                            <div class="ca-conten">
                                <h4 class="h4-responsive font-weight-bold ca-main"><strong>Reservasi Online</strong></h4>
                                <button onclick="myChat()" class="btn btn-outline-info btn-sm waves-effect">Info</button>
                                <p class="text-fluid ca-sub">Setelah reservasi terkirim kami akan menghubungi anda dalam waktu 1x24 jam</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="col-4 animate ca-menu pl-1 pr-2">
                    <li>
                        <a href="#" class="text-center">
                            <hr style="background-color: lightskyblue; height: 3px;">
                            <div class="ca-conten">
                                <h4 class="h4-responsive font-weight-bold ca-main"><strong>Hubungi Kami</strong></h4>
                                <i class="fa fa-phone-square fa-2x" style="color: lightskyblue" aria-hidden="true"></i>
                                <p class="text-fluid orange-text ca-sub">081362621616</p>
                                <p class="text-fluid ca-sub">Jika ada keluhan silahkan hubungi kami</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="panel" style="width: 110px;">
            <h5 class="font-weight-bold white-text h5-responsive" style="background-color: #54b0d5; padding: 10px 20px;">Disease</h5>
        </div>
        <div class="container-fluid" style="background-color: lightskyblue; margin-top: -10px;">
            <div class="row">
                    <div class="col-4 unlist">

                        @if( Helper::get_categories_left() )
                            @foreach( Helper::get_categories_left() as $cat )
                                <li class="nav-item {{ $cat->category_slug == Request::query('category_slug') ? 'active' : '' }}"><a class="nav-link waves-effect deas" href="/diseases/{{ $cat->category_slug}}">{{ $cat->category_name }}</a></li>
                            @endforeach
                        @endif

                    </div>
                    <div class="col-4 unlist">
                        @if( Helper::get_categories_right() )
                            @foreach( Helper::get_categories_right() as $cat )
                                <li class="nav-item {{ $cat->category_slug == Request::query('category_slug') ? 'active' : '' }}"><a class="nav-link waves-effect deas" href="/diseases/{{ $cat->category_slug}}">{{ $cat->category_name }}</a></li>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-4 unlist text-center" style="background: #54b0d5;">
                        <a href="/chat"><img style="margin-top: 20px;" src="{{asset('img/Konsultasi-online-side.png')}}" alt="Klinik Sentosa" class="img-fluid"></a><br><br>
                        <a href="/chat"><img src="{{asset('img/ink.png')}}" alt="Klinik Sentosa" class="img-fluid"></a>

                        <p class="text-fluid white-text mt-4" onclick="myChat()">Konsultasikan kepada kami</p>
                    </div>
            </div>
        </div>

        <div style="margin-top: 30px">
            <a href="/chat"><img src="{{asset('img/Bottom-banner.jpg')}}" class="img-fluid" alt="Klinik Sentosa" style="width: 100%;"></a>
        </div>
        <br>
        <!-- form consultation -->
        <div class="container-fluid" style="padding: 0 20px">
            <div class="card" style="box-shadow: 1px 1px 10px silver, 0 0 50px silver, 0 0 10px white;">
                <div class="card-header"><h4 class="h4-responsive font-weight-bold text-center" style="color: #33b5e5;">Reservasi Online</h4></div>
                <div class="card-body">
                    <form action="{{ route('home.save_data') }}" method="POST" id="save-user" class="needs-validation" novalidate>
                        {{ csrf_field() }}
                        <!-- Grid row 1 -->
                        <div class="form-row">
                            <!-- Grid column -->
                            <div class="col-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <!-- Default input -->
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama" maxlength="30" required>

                                @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
	                            @endif
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-6 {{ $errors->has('age') ? 'has-error' : '' }}">
                                <!-- Default input -->
                                <input type="text" class="form-control" name="age" placeholder="Usia" value="{{ old('age')}}" required>

                                @if ($errors->has('age'))
	                            <div class="invalid-feedback">
	                                {{ $errors->first('age') }}
	                            </div>
	                            @endif
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row 1 -->

                        <br>
                        <!-- Grid row 2 -->
                        <div class="form-row">
                            <!-- Grid column -->
                            <div class="col-6 {{ $errors->has('address') ? 'has-error' : ''}}">
                                <!-- Default input -->
                                <input type="text" class="form-control" name="address" placeholder="Alamat" value="{{ old('address')}}" required>

                                @if ($errors->has('address'))
	                            <div class="invalid-feedback">
	                                {{ $errors->first('address') }}
	                            </div>
	                            @endif
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-6 {{ $errors->has('phone' ? 'has-error' : '') }}">
                                <!-- Default input -->
                                <input type="text" class="form-control" name="phone" placeholder="Telephone" value="{{ old('phone') }}" maxlength="13" required />

                                @if ($errors->has('phone'))
	                            <div class="invalid-feedback">
	                                {{ $errors->first('phone') }}
	                            </div>
	                            @endif
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row 2 -->
                        <br>
                        <!-- Grid row 3 -->
                        <div class="form-row">
                            <div class="col-12 {{ $errors->has('complaint') ? 'has-error' : '' }}">
                                <textarea name="complaint" class="form-control" rows="10" placeholder="Keluhan" required>{{ old('complaint') }}</textarea>

                                @if ($errors->has('complaint'))
	                            <div class="invalid-feedback">
	                                {{ $errors->first('complaint') }}
	                            </div>
	                            @endif
                            </div>
                        </div>
                        <!-- Grid row 3 -->

                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-info btn-rounded effect effect-5" value="Kirim Reservasi" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br><br>

        <div class="panel" style="background-color: gold; height: 40px; padding-left: 20px;">
            <h4 class="font-weight-bold h5-responsive" style="line-height: 40px;">Lokasi Klinik</h4>
        </div>

        <!-- Maps for Apollo Clinic -->
        <div class="container">
            <br><br>
            <section class="frame-maps" style="border: 1px solid silver">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7530835854645!2d106.90888801435004!3d-6.1638132621236705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f52d5c6c86d5%3A0x861675efeba74231!2sKlinik+Sentosa!5e0!3m2!1sid!2sid!4v1545964332809" height="451" frameborder="0" style="width: 100% !important;" allowfullscreen></iframe>
            </section>
        </div>
        <br><br>
    {{--  </main>  --}}

    @stop
