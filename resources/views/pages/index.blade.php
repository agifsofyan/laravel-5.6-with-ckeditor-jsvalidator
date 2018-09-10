@extends('main')
    @section('title', '| Home')
    @section('content')

    @include('alert.flash-message')

    <link href="{{ asset('css/hover-button.css') }}" rel="stylesheet">

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
                                {{-- <a href="/chat" style="border: 1px solid cornflowerblue; padding: 5px; border-radius:  5px;">Daftarkan</a> --}}
                                <button onclick="myChat()" type="button" class="btn btn-outline-info btn-sm waves-effect">Info</button>
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
                                </a>
                            </div>
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
                    {{-- <div class="col-4 unlist text-center" style="background: #54b0d5; background-image: url('/img/consultation.png'); background-repeat: no-repeat; background-size: 150%; background-position: center; cursor: pointer;" onclick="myChat()"> --}}
                    <div class="col-4 unlist text-center" style="background: #54b0d5;">
                        <a href="/chat"><img style="margin-top: 20px;" src="{{asset('img/Konsultasi-online-side.png')}}" alt="Klinik Sentosa" class="img-fluid"></a><br><br>
                        <a href="/chat"><img src="{{asset('img/ink.png')}}" alt="Klinik Sentosa" class="img-fluid"></a>

                        <p class="text-fluid white-text mt-4" onclick="myChat()">Konsultasikan kepada kami</p>
                    </div>
            </div>
        </div>

        {{-- <br><br> --}}

        {{-- <div class="panel" style="background-color: gold; height: 40px; padding-left: 20px;">
            <h4 class="font-weight-bold h5-responsive" style="line-height: 40px;">TESTIMONIALS</h4>
        </div>

        <br><br>

        <section>
        <div id="multi-item-example" class="carousel slide carousel-multi-item multi-item-example" data-ride="carousel">
            <ol class="carousel-indicators carousel-indicators-2">
                <li style="opacity: 0.3; filter: alpha(opacity=40);" data-target="#multi-item-example" data-slide-to="0"></li>
                <li style="opacity: 0.3; filter: alpha(opacity=40);" data-target="#multi-item-example" data-slide-to="1" class="active"></li>
                <li style="opacity: 0.3; filter: alpha(opacity=40);" data-target="#multi-item-example" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-6">
                            <div class="z-depth-1" style="border: 1px solid lightskyblue; margin-left: 25px; border-radius: 10px; margin-bottom: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-5">
                                        <div class="text-right">
                                            <img src="{{asset('img/user-mate.png')}}" class="img-fluid" alt="KLinik Sentosa">
                                        </div>
                                    </div>

                                    <div class="col-6 text-left d-flex justify-content-end">
                                        <table height="100%">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">Unknowns</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">28 tahun</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="z-depth-1" style="border: 1px solid lightskyblue; margin-right: 25px; border-radius: 10px; margin-bottom: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-5">
                                        <div class="text-right">
                                            <img src="{{asset('img/user-mate.png')}}" class="img-fluid" alt="KLinik Sentosa">
                                        </div>
                                    </div>

                                    <div class="col-6 text-left d-flex justify-content-end">
                                        <table height="100%">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">Unknowns</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">28 tahun</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item active carousel-item-left">
                     <div class="row">
                        <div class="col-6">
                            <div class="z-depth-1" style="border: 1px solid lightskyblue; margin-left: 25px; border-radius: 10px; margin-bottom: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-5">
                                        <div class="text-right">
                                            <img src="{{asset('img/user-mate.png')}}" class="img-fluid" alt="KLinik Sentosa">
                                        </div>
                                    </div>

                                    <div class="col-6 text-left d-flex justify-content-end">
                                        <table height="100%">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">Unknowns</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">28 tahun</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="z-depth-1" style="border: 1px solid lightskyblue; margin-right: 25px; border-radius: 10px; margin-bottom: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-5">
                                        <div class="text-right">
                                            <img src="{{asset('img/user-mate.png')}}" class="img-fluid" alt="KLinik Sentosa">
                                        </div>
                                    </div>

                                    <div class="col-6 text-left d-flex justify-content-end">
                                        <table height="100%">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">Unknowns</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">28 tahun</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item carousel-item-next carousel-item-left">
                     <div class="row">
                        <div class="col-6">
                            <div class="z-depth-1" style="border: 1px solid lightskyblue; margin-left: 25px; border-radius: 10px; margin-bottom: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-5">
                                        <div class="text-right">
                                            <img src="{{asset('img/user-mate.png')}}" class="img-fluid" alt="KLinik Sentosa">
                                        </div>
                                    </div>

                                    <div class="col-6 text-left d-flex justify-content-end">
                                        <table height="100%">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">Unknowns</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">28 tahun</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="z-depth-1" style="border: 1px solid lightskyblue; margin-right: 25px; border-radius: 10px; margin-bottom: 20px;">
                                <div class="card-header white-text" style="background-color: lightskyblue; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, nam officia ut modi distinctio, tempore repellat quibusdam perspiciatis laboriosam voluptas quaerat quasi asperiores, natus eaque aut adipisci quas fuga dolor.
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-5">
                                        <div class="text-right">
                                            <img src="{{asset('img/user-mate.png')}}" class="img-fluid" alt="KLinik Sentosa">
                                        </div>
                                    </div>

                                    <div class="col-6 text-left d-flex justify-content-end">
                                        <table height="100%">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">Unknowns</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">28 tahun</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section> --}}

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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.766451526646!2d106.90551151439153!3d-6.1620250955386995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5323f16d2f3%3A0xe3d634daa6179698!2sKlinik+Utama+Sentosa!5e0!3m2!1sid!2sid!4v1521260716565" height="451" frameborder="0" style="width: 100% !important;" allowfullscreen></iframe>
            </section>
        </div>
        <br><br>
    {{--  </main>  --}}

<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav fixed">
  <ul class="custom-scrollbar">
      <!-- Logo -->
      <li>
          <div class="logo-wrapper waves-light">
              <a href="#"><img src="{{ asset('img/logo.png') }}" class="img-fluid flex-center"></a>
          </div>
      </li>
      <!--/. Logo -->
      <!--Social-->
      <li>
          <ul class="social">
              <li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
              <li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
              <li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
              <li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
          </ul>
      </li>
      <!--/Social-->
      <!--Search Form-->
      <li>
          <form class="search-form" role="search">
              <div class="form-group md-form mt-0 pt-1 waves-light">
                  <input type="text" class="form-control" placeholder="Search">
              </div>
          </form>
      </li>
      <!--/.Search Form-->
      <!-- Side navigation links -->
      <li>
          <ul class="collapsible collapsible-accordion">
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Submit blog<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="#" class="waves-effect">Submit listing</a>
                          </li>
                          <li><a href="#" class="waves-effect">Registration form</a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Instruction<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="#" class="waves-effect">For bloggers</a>
                          </li>
                          <li><a href="#" class="waves-effect">For authors</a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> About<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="#" class="waves-effect">Introduction</a>
                          </li>
                          <li><a href="#" class="waves-effect">Monthly meetings</a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-o"></i> Contact me<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="#" class="waves-effect">FAQ</a>
                          </li>
                          <li><a href="#" class="waves-effect">Write a message</a>
                          </li>
                          <li><a href="#" class="waves-effect">FAQ</a>
                          </li>
                          <li><a href="#" class="waves-effect">Write a message</a>
                          </li>
                          <li><a href="#" class="waves-effect">FAQ</a>
                          </li>
                          <li><a href="#" class="waves-effect">Write a message</a>
                          </li>
                          <li><a href="#" class="waves-effect">FAQ</a>
                          </li>
                          <li><a href="#" class="waves-effect">Write a message</a>
                          </li>
                      </ul>
                  </div>
              </li>
          </ul>
      </li>
      <!--/. Side navigation links -->
  </ul>
  <div class="sidenav-bg rgba-blue-strong"></div>
</div>
<!--/. Sidebar navigation -->

    @stop
