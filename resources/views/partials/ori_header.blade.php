    <nav class="container-fluid text-center white-text" style="background-color: lightskyblue;;">
        <div class="row">
            <div class="col-4 top-info">
                Lokasi: Kelapa Gading timur, Kota Jakarta Utara
            </div>
            <div class="col-4 top-info">
                Hubungi Kami: 081362621616
            </div>
            <div class="col-4 top-info">
                <div class="container">
                    <table style="width: 100%;">
                        <tr>
                            <td><a href="#"><img src="{{asset('img/sosmed/Twitter.png')}}" alt="Twitter"></a></td>
                            <td><a href="#"><img src="{{asset('img/sosmed/Google-Plus.png')}}" alt="Google Plus"></a></td>
                            <td><a href="#"><img src="{{asset('img/sosmed/FB.png')}}" alt="Facebook"></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-justify" style="background-color: lightskyblue; padding: 30px; border-top: 1px solid white; border-bottom: 1px solid white;">
        <div class="row">
            <div class="col-6 text-left">
                <a href="/" class="text-center"><img src="{{ asset('img/logo.png') }}" class="img-fluid"></a>
            </div>
            <div class="col-6 text-right">
                <a href="#" class="text-center"><img src="{{ asset('img/reservasi-hoverl.png') }}" class="img-fluid"></a>
            </div>
        </div>
    </div>

    <!--Navbar-->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark mb-1 info-color fix-nav">

        <!-- Navbar brand -->
        <a class="navbar-brand" style="line-height: 40px;" href="/">Klinik Sentosa</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">

                <!-- Dropdown -->
                <li class="nav-item dropdown mega-dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Disease</a>
                    <div class="dropdown-menu dropdown-primary mega-menu v-2 row z-depth-1 special-color" aria-labelledby="navbarDropdownMenuLink">
                        <div class="row mx-md-4 mx-1">
                            <div class="col-6 sub-menu">
                                <ul class="caret-style pl-0">
                                    @if( Helper::get_categories_left() )
                                        @foreach( Helper::get_categories_left() as $cat )
                                            <li class="{{ $cat->category_slug == Request::query('category_slug') ? 'active' : '' }}"><a class="menu-item mb-0 waves-effect" href="/diseases/{{ $cat->category_slug}}">{{ $cat->category_name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="col-6 sub-menu">
                                <ul class="caret-style pl-0">
                                    @if( Helper::get_categories_right() )
                                        @foreach( Helper::get_categories_right() as $cat )
                                            <li class="{{ $cat->category_slug == Request::query('category_slug') ? 'active' : '' }}"><a class="menu-item mb-0 waves-effect" href="/diseases/{{ $cat->category_slug}}">{{ $cat->category_name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                @if( Helper::get_pages() )
                    @foreach( Helper::get_pages() as $page )
                        {{-- <li class="nav-item {{ Request::query('page','slug') ? 'active' : '' }}"><a class="nav-link" href="/page/{{ $page->slug}}">{{ $page->title }}</a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="/page/{{ $page->slug}}">{{ $page->title }}</a></li>
                    @endforeach
                @endif
            </ul>

            <!-- Search -->
            <form class="form-inline active-cyan-4" action="/searching/" method="GET">
                <input class="form-control form-control-sm mr-3 w-75" type="text" name="su" value="{{ Request::query('su') }}" placeholder="Enter For Search" aria-label="Search">
                {{--  <a style="border: 1px solid white; padding: 1px 4px; border-radius: 5px;"><i class="fa fa-search white-text" aria-hidden="true"></i></a>  --}}
                {{-- <button type="submit" class="btn btn-info btn-sm">Search</button> --}}
            </form>
        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->

{{-- Style for mega-dropdown --}}
<style>
    .navbar .mega-dropdown {
        position: static !important; }

      .navbar .dropdown-menu.mega-menu {
        width: 100%;
        border: none;
        border-radius: 0; }
        .navbar .dropdown-menu.mega-menu.v-2 a {
          padding: 5px 10px 5px 35px; }
          .navbar .dropdown-menu.mega-menu.v-2 a.news-title-2 {
            font-weight: 500;
            font-size: 1.1rem;
            line-height: 1;
            -webkit-transition: .2s;
            transition: .2s;
            color: #fff !important; }
            .navbar .dropdown-menu.mega-menu.v-2 a.news-title-2:hover {
              color: #d0d6e2 !important; }
        .navbar .dropdown-menu.mega-menu.v-2 .sub-menu ul {
          list-style: none; }
          .navbar .dropdown-menu.mega-menu.v-2 .sub-menu ul.caret-style li {
            -webkit-transition: .3s;
            transition: .3s; }
            .navbar .dropdown-menu.mega-menu.v-2 .sub-menu ul.caret-style li:hover {
              background-color: rgba(0, 0, 0, 0.2);
              -webkit-transition: .3s;
              transition: .3s; }
            .navbar .dropdown-menu.mega-menu.v-2 .sub-menu ul.caret-style li a:after {
              font-family: "fontAwesome";
              content: '\f0da';
              position: absolute;
              left: 0.5rem;
              font-size: 12px;
              top: auto; }
        .navbar .dropdown-menu.mega-menu.v-2 .sub-menu a.menu-item {
          color: #fff !important; }
          .navbar .dropdown-menu.mega-menu.v-2 .sub-menu a.menu-item:hover {
            color: #fff !important; }
        .navbar .dropdown-menu.mega-menu.v-2 .sub-title {
          /*padding-bottom: 1rem;*/
          /*margin-bottom: 1rem;*/
          border-bottom: 1px solid; }
        .navbar .dropdown-menu.mega-menu.v-2 .font-small {
          font-size: 0.85rem; }
</style>
