@extends('main')
    @section('title', '| Home')
    @section('content')

    @include('alert.flash-message')

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
                    <img class="d-block w-100" src="{{asset('img/slider/Slide-1.jpg')}}" alt="First slide">
                </div>
                <!--/First slide-->
                <!--Second slide-->
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg" alt="Second slide">
                </div>
                <!--/Second slide-->
                <!--Third slide-->
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg" alt="Third slide">
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
            <div class="row" style="margin-top: 30px;">
                <div class="col-4 text-center" style="padding-top: 20px;">
                    <hr style="background-color: lightskyblue; height: 3px;">
                    <!-- Title -->
                    <h4 class="h4-responsive font-weight-bold"><strong>Jam Buka</strong></h4>
                    <i style="color: cornflowerblue;" class="fa fa-hand-o-down" aria-hidden="true"></i>
                    <h5 style="color: cornflowerblue" class="h5-responsive"><strong>Setiap Hari</strong></h5>
                    <!-- Text -->
                    <h5 class="h5-responsive font-weight-bold">09.00 - 21.00 wib</h5>
                    <p class="text-fluid">Hari libur tetap buka</p>
                </div>
                <div class="col-4 text-center" style="padding-top: 20px;">
                    <hr style="background-color: lightskyblue; height: 3px;">
                    <!-- Title -->
                    <h4 class="h4-responsive font-weight-bold"><strong>Reservasi Online</strong></h4>
                    <br>
                    <a href="#" style="border: 1px solid cornflowerblue; padding: 5px; border-radius:  5px;">Daftarkan</a>
                    <hr>
                    <!-- Text -->
                    <p class="text-fluid">Setelah reservasi terkirim kami akan menghubungi anda dalam waktu 1x24 jam</p>
                </div>
                <div class="col-4 text-center" style="padding-top: 20px;">
                    <hr style="background-color: lightskyblue; height: 3px;">
                    <h4 class="h4-responsive font-weight-bold"><strong>Hubungi Kami</strong></h4>
                    <!-- Subtitle -->
                    <i class="fa fa-phone-square fa-2x" style="color: lightskyblue" aria-hidden="true"></i>
                    <p class="text-fluid font-weight-bold">081362621616</p>
                    <!-- Text -->
                    <p class="text-fluid">Jika ada keluhan silahkan hubungi kami</p>
                </div>
            </div>
        </div>

        <div class="panel" style="width: 110px;">
            <h5 class="font-weight-bold white-text h5-responsive" style="background-color: #54b0d5; padding: 10px 20px;">Disease</h5>
        </div>
        <div class="container-fluid" style="background-color: lightskyblue; margin-top: -10px;">
            <div class="row">
                    <div class="col-5 unlist" style="padding: 20px;">

                        @if( Helper::get_categories_left() )
                            @foreach( Helper::get_categories_left() as $cat )
                                <li class="nav-item {{ $cat->category_slug == Request::query('category_slug') ? 'active' : '' }}"><a class="nav-link waves-effect deas" href="/diseases/{{ $cat->category_slug}}">{{ $cat->category_name }}</a></li>
                            @endforeach
                        @endif

                    </div>
                    <div class="col-4 unlist" style="padding: 20px;">
                        @if( Helper::get_categories_right() )
                            @foreach( Helper::get_categories_right() as $cat )
                                <li class="nav-item {{ $cat->category_slug == Request::query('category_slug') ? 'active' : '' }}"><a class="nav-link" href="/diseases/{{ $cat->category_slug}}">{{ $cat->category_name }}</a></li>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-3 unlist text-center" style="background: #54b0d5; padding: 20px;">
                        <!-- <ul> -->
                            <li><a href="#"><img src="{{asset('img/Konsultasi-online-side.png')}}" alt="" class="img-fluid"></a></li><br>
                            <li><a href="/chat"><img src="{{asset('img/ink.png')}}" alt="" class="img-fluid"></a></li>
                        <!-- </ul> -->
                    </div>
            </div>
        </div>

        <br><br>

        <div class="panel" style="background-color: gold; height: 40px; padding-left: 20px;">
            <h4 class="font-weight-bold h5-responsive" style="line-height: 40px;">TESIMONIALS</h4>
        </div>

        <br><br>

        <!-- Carousel 2 -->
        <section>
        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item multi-item-example" data-ride="carousel">

            <!--Controls-->
            <!-- <div class="controls-top">
                <a class="btn-floating waves-effect waves-light" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="btn-floating waves-effect waves-light" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
            </div> -->
            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators carousel-indicators-2" style="margin-bottom: -10px;">
                <li style="border: 1px solid slategrey;" data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li style="border: 1px solid slategrey;" data-target="#multi-item-example" data-slide-to="1" ></li>
                <li style="border: 1px solid slategrey;" data-target="#multi-item-example" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item">

                    <div class="row">
                        <div class="col-6">
                            <div class="card" style="padding-left: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <img src="{{asset('img/user-mate.png')}}" style="width: 20%;" class="img-fluid" alt="">
                                    <!-- <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Judul kartu</font></font></h4>
                                    <p class="card-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Beberapa contoh teks cepat untuk membangun pada judul kartu dan membuat sebagian besar konten kartu.</font></font></p>
                                    <a class="btn btn-primary waves-effect waves-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tombol</font></font></a> -->

                                    <div class="float-right" style="margin-top: 10px;">
                                        <p class="text-fluid">Unknowns</p>
                                        <p class="text-fluid">28 tahun</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card" style="padding-right: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <img src="{{asset('img/user-mate.png')}}" style="width: 20%;" class="img-fluid" alt="">
                                    <!-- <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Judul kartu</font></font></h4>
                                    <p class="card-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Beberapa contoh teks cepat untuk membangun pada judul kartu dan membuat sebagian besar konten kartu.</font></font></p>
                                    <a class="btn btn-primary waves-effect waves-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tombol</font></font></a> -->

                                    <div class="float-right" style="margin-top: 10px;">
                                        <p class="text-fluid">Unknowns</p>
                                        <p class="text-fluid">28 tahun</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item active carousel-item-left">

                    <div class="row">
                        <div class="col-6">
                            <div class="card" style="padding-left: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <img src="{{asset('img/user-mate.png')}}" style="width: 20%;" class="img-fluid" alt="">
                                    <!-- <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Judul kartu</font></font></h4>
                                    <p class="card-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Beberapa contoh teks cepat untuk membangun pada judul kartu dan membuat sebagian besar konten kartu.</font></font></p>
                                    <a class="btn btn-primary waves-effect waves-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tombol</font></font></a> -->

                                    <div class="float-right" style="margin-top: 10px;">
                                        <p class="text-fluid">Unknowns</p>
                                        <p class="text-fluid">28 tahun</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card" style="padding-right: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <img src="{{asset('img/user-mate.png')}}" style="width: 20%;" class="img-fluid" alt="">
                                    <!-- <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Judul kartu</font></font></h4>
                                    <p class="card-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Beberapa contoh teks cepat untuk membangun pada judul kartu dan membuat sebagian besar konten kartu.</font></font></p>
                                    <a class="btn btn-primary waves-effect waves-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tombol</font></font></a> -->

                                    <div class="float-right" style="margin-top: 10px;">
                                        <p class="text-fluid">Unknowns</p>
                                        <p class="text-fluid">28 tahun</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Second slide-->

                <!--Third slide-->
                <div class="carousel-item carousel-item-next carousel-item-left">

                    <div class="row">
                        <div class="col-6">
                            <div class="card" style="padding-left: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <img src="{{asset('img/user-mate.png')}}" style="width: 20%;" class="img-fluid" alt="">
                                    <!-- <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Judul kartu</font></font></h4>
                                    <p class="card-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Beberapa contoh teks cepat untuk membangun pada judul kartu dan membuat sebagian besar konten kartu.</font></font></p>
                                    <a class="btn btn-primary waves-effect waves-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tombol</font></font></a> -->

                                    <div class="float-right" style="margin-top: 10px;">
                                        <p class="text-fluid">Unknowns</p>
                                        <p class="text-fluid">28 tahun</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card" style="padding-right: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <img src="{{asset('img/user-mate.png')}}" style="width: 20%;" class="img-fluid" alt="">
                                    <!-- <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Judul kartu</font></font></h4>
                                    <p class="card-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Beberapa contoh teks cepat untuk membangun pada judul kartu dan membuat sebagian besar konten kartu.</font></font></p>
                                    <a class="btn btn-primary waves-effect waves-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tombol</font></font></a> -->

                                    <div class="float-right" style="margin-top: 10px;">
                                        <p class="text-fluid">Unknowns</p>
                                        <p class="text-fluid">28 tahun</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Third slide-->

            </div>
            <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->

        </section>
        <!-- End Carousel 2 -->

        <div class="container-fluid" style="padding: 30px 10px;">
            <a href="#"><img src="{{asset('img/Bottom-banner.jpg')}}" style="width: 100%;"></a>
        </div>
        <br>
        <!-- form consultation -->
        <div class="container-fluid" style="padding: 0 20px">
            <div class="card" style="box-shadow: 1px 1px 10px silver, 0 0 50px silver, 0 0 10px white;">
                <div class="card-header"><h4 class="h4-responsive font-weight-bold text-center" style="color: #33b5e5;">Reservasi Online</h4></div>
                <div class="card-body">
                    <form action="{{ route('reservations.store') }}" method="POST" id="save-user" class="needs-validation" novalidate>
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
                            <input type="submit" class="btn btn-info btn-rounded" value="Kirim Reservasi" style="border-radius: 10px;" />
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.766451526646!2d106.90551151439153!3d-6.1620250955386995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5323f16d2f3%3A0xe3d634daa6179698!2sKlinik+Utama+Sentosa!5e0!3m2!1sid!2sid!4v1521260716565" height="451" frameborder="0" style="width: 100% !important;" allowfullscreen></iframe>
            </section>
        </div>
        <br><br>
    {{--  </main>  --}}

    @stop
