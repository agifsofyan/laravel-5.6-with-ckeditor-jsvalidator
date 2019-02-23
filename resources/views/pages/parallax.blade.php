@extends('main')
@section('title')
@if( $page->count() )
@foreach( $page as $pages )
    | {{ $pages->title }}
@endforeach
@endif
@endsection
@section('content')

@include('alert.flash-message')

<div class="parallax">
  <section>
    <div class="image" data-type="background" data-speed="2"></div>
    <div class="stuff" data-type="content"><h1>Ketahui Tentang Kami</h1><h2><i class="fa fa-user-md"></i> Kami Ada Untuk Anda</h2></div>
  </section>
</div>

<link href="{{asset('css/parallax.css')}}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- <div class="jumbotron z-depth-0 pb-2">
    <div class="container">
        @if( $page->count() )
            @foreach( $page as $pages )
            <div class="jumbotron">
                    <div class="container">
                        <div class="blog-header">
                            <h1 class="blog-title">{{ $pages->title }}</h1>
                        </div>
                        <div class="row">
                            <div class="col-12 blog-main">

                                <div class="blog-content">
                                    {!! nl2br( $pages->content ) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div> --}}

<section class="text-center">
<div class="jumbotron text-center m-0">

  <!-- Title -->
  <h2 class="card-title h2">Klinik Utama Sentosa</h2>
  <!-- Subtitle -->
  <p class="blue-text my-4 font-weight-bold">Spesialis Penyakit Kulit Dan Kelamin</p>

  <!-- Grid row -->
  <div class="row d-flex justify-content-center animated fadeInRightBig">

    <!-- Grid column -->
    <div class="col-xl-7 pb-2">

      <p class="card-text">Kami adalah klinik spesialis penyakit kulit dan kelamin yang siap menlayani anda. Kami membantu para pasien yang mengalami gangguan pada kulit dan kelaminnya. Kami memberikan pelayanan yang baik untuk kesembuhan para pasien dengan servis, dokter dan peralatan terbaik saat ini.</p>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-4">

  <div class="pt-2 animated fadeInLeftBig">
    <p>Ingin bertanya kepada kami silahkan chat online disini.</p>
    <button type="button" class="btn btn-outline-primary waves-effect" onclick="myChat()">CHAT <i class="fa fa-wechat" aria-hidden="true"></i></button>
  </div>

</div>
<!-- Jumbotron -->

</section>

<div class="parallax">
  <section>
    <div class="image" data-type="background" data-speed="7"></div>
    <div class="stuff" data-type="content"><h2> Kesehatan itu penting</h2><p>Banyak yang dapat dilakukan ketika anda sehat.</p></div>
  </section>
</div>

<!-- Section: Contact v.1 -->
<div class="container my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5">Contact us</h2>
  <!-- Section description -->
  <p class="text-center w-responsive mx-auto pb-5">Kami bergerak dibidang kesehatan. Fokus kami pada kesehatan bagian kulit dan kelamin. Kami berharap dapat membantu banyak pasien agar dapat sehat kembali</p>

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5 mb-lg-0 mb-4">

      <!-- Form with header -->
      <div class="card">
        <div class="card-body">
          <!-- Header -->
          <div class="card-header z-depth-2 floating form-header blue accent-1 p-4 mb-5" style="margin-top: -40px;">
            <h3 class="mt-2"><i class="fa fa-envelope"></i> Write to us:</h3>
          </div>
          <p class="dark-grey-text">Silahkan ajukan pertanyaan atau saran anda kepada kami</p>
          <!-- Body -->
          <form action="{{ route('home.save_data') }}" method="POST" id="save-user" class="needs-validation" novalidate>
            {{ csrf_field() }}
            <div class="md-form {{ $errors->has('name') ? ' has-error' : '' }}">
              <i class="fa fa-user prefix grey-text"></i>
              <input type="text" id="form-name" class="form-control" name="name" value="{{ old('name') }}" maxlength="30" required>
              <label for="form-name">Nama Kamu</label>

              @if ($errors->has('name'))
                <div class="invalid-feedback">
                  {{ $errors->first('name') }}
                </div>
              @endif
            </div>
            <div class="md-form {{ $errors->has('age') ? 'has-error' : '' }}">
              <i class="fa fa-plus-square prefix grey-text"></i>
              <input type="text" id="form-email" class="form-control" name="age" value="{{ old('age') }}" required>
              <label for="form-email">Usia Kamu</label>

              @if ($errors->has('age'))
                <div class="invalid-feedback">
                  {{ $errors->first('age') }}
                </div>
              @endif
            </div>
            <div class="md-form {{ $errors->has('address') ? 'has-error' : '' }}">
              <i class="fa fa-address-book prefix grey-text"></i>
              <input type="text" id="form-email" class="form-control" name="address" value="{{ old('address') }}" required>
              <label for="form-email">Alamat Kamu</label>

              @if ($errors->has('address'))
                <div class="invalid-feedback">
                  {{ $errors->first('address') }}
                </div>
              @endif
            </div>
            <div class="md-form {{ $errors->has('phone' ? 'has-error' : '') }}">
              <i class="fa fa-tablet prefix grey-text"></i>
              <input type="text" id="form-Subject" class="form-control" name="phone" value="{{ old('phone') }}" maxlength="13" required>
              <label for="form-Subject">No. Telepon</label>

              @if ($errors->has('phone'))
                <div class="invalid-feedback">
                  {{ $errors->first('phone') }}
                </div>
              @endif
            </div>
            <div class="md-form {{ $errors->has('complaint') ? 'has-error' : '' }}">
              <i class="fa fa-pencil prefix grey-text"></i>
              <textarea type="text" id="form-text" class="form-control md-textarea" rows="3" name="complaint">{{ old('complaint') }}</textarea>
              <label for="form-text">Keluhan Kamu</label>

              @if ($errors->has('complaint'))
                <div class="invalid-feedback">
                  {{ $errors->first('complaint') }}
                </div>
              @endif
            </div>
            <div class="text-center">
              <button class="btn btn-light-blue" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Google map-->
      <div id="map-container" class="rounded z-depth-1-half map-container" style="height: 400px">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.766451526646!2d106.90551151439153!3d-6.1620250955386995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5323f16d2f3%3A0xe3d634daa6179698!2sKlinik+Utama+Sentosa!5e0!3m2!1sid!2sid!4v1521260716565" height="400" frameborder="0" style="width: 100% !important;" allowfullscreen></iframe>
      </div>
      <br>
      <!-- Buttons-->
      <div class="row text-center">
        <div class="col-md-4">
          <a class="btn btn-floating blue accent-1 white-text" >
            <i class="fa fa-map-marker fa-2x"></i>
          </a>
          <p>Jakarta Utara</p>
          <p class="mb-md-0">Indonesia</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-floating blue accent-1 white-text">
            <i class="fa fa-phone fa-2x"></i>
          </a>
          <p>+62 813 6262 1616</p>
          <p class="mb-md-0">Setiap Hari, 09.00 - 21.00 WIB</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-floating blue accent-1 white-text">
            <i class="fa fa-envelope fa-2x"></i>
          </a>
          <p class="mt-3">sentosaklinik@gmail.com</p>
          {{-- <p class="mb-0">sale@gmail.com</p> --}}
        </div>
      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>

<script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
<script>
    $('.multi-item-example').carousel({
      interval: 5000
    });
</script>


{{-- <div class="at-twitter"><a href="//twitter.com/hendrysadrak" target="_blank">@grischpel</a></div> --}}

@endsection
