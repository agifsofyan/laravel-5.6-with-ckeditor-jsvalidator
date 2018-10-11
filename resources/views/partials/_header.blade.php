<style>
    @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
</style>

    <!--Double navigation-->
    {{-- <header> --}}
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav fixed mdb-sidenav">
            <div>
                <ul class="custom-scrollbar list-unstyled" style="max-height:100vh;">
                    <!-- Logo -->
                    <li>
                        <div class="logo-wrapper waves-light">
                            <a href="/" class="mt-2"><img src="{{asset('img/logo.png')}}" class="img-fluid flex-center" alt="Klinik Utama Sentosa"></a>
                        </div>
                    </li>
                    <!--/. Logo -->
                    <!--Social-->
                    <li>
                        <ul class="social">
                            <li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook cyan-text"> </i></a></li>
                            <li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest cyan-text"> </i></a></li>
                            <li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus cyan-text"> </i></a></li>
                            <li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter cyan-text"> </i></a></li>
                        </ul>
                    </li>
                    <!--/Social-->
                    <!--Search Form-->
                    <li>
                        <form class="search-form cyan" style="opacity: 0.6;" role="search" action="/searching/" method="GET">
                            <div class="form-group md-form mt-0 pt-1 waves-light">
                                <input class="form-control" type="text" name="su" value="{{ Request::query('su') }}" placeholder="Enter For Search" aria-label="Search" style="color: black !important; font-weight: bold;">
                            </div>
                        </form>
                    </li>
                    <!--/.Search Form-->
                    <!-- Side navigation links -->
                    <li>
                        <ul class="collapsible collapsible-accordion">
                            @if( Helper::get_categories() )
                                @foreach( Helper::get_categories() as $cat )
                                    <li class="list-cat">
                                        <a class="collapsible-header waves-effect arrow-r" href="/diseases/{{ $cat->category_slug}}"><i class="fa fa-tag"></i> {{ $cat->category_name }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <!--/. Side navigation links -->
                </ul>
                <div class="sidenav-bg mask-strong"></div>
            </div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
    {{-- </header> --}}

    <nav class="container-fluid text-center white-text" style="background-color: lightskyblue; margin: 0;">
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
                <a href="/" class="text-center"><img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="Klinik Utama Sentosa"></a>
            </div>
            <div class="col-6 text-right">
                <a href="#" class="text-center"><img src="{{ asset('img/reservasi-hoverl.png') }}" class="img-fluid" alt="Klinik Utama Sentosa"></a>
            </div>
        </div>
    </div>

<nav>
    <!--Navbar-->
    <ul id="navbar" class="navbar navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav navbar-expand-lg navbar-dark mb-1 info-color fix-nav pl-3" style="padding: 10px;">
        {{-- <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
        </div> --}}

        <li class="nav-item waves-effect home"><a href="/" class=" nav-link {{ null == Request::query() ? 'active' : '' }}"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
            <figcaption></figcaption>
        </li>
        <li class="nav-item waves-effect button-collapse" data-activates="slide-out" style="list-style: none;"><a href="#" class="nav-link">Diseases</a></li>
        <!-- Navbar brand -->
        @if( Helper::get_pages() )
            @foreach( Helper::get_pages() as $page )
                {{-- <li class="nav-item {{ Request::query('page','slug') ? 'active' : '' }}"><a class="nav-link" href="/page/{{ $page->slug}}">{{ $page->title }}</a></li> --}}
                <li class="nav-item waves-effect" style="list-style: none;"><a class="nav-link {{ $page->id == Request::query('page_id') ? 'active' : '' }}" href="/pages/{{ $page->slug}}">{{ $page->title }}</a></li>
            @endforeach
        @endif
        <form class="breadcrumb-dn ml-auto d-none d-lg-block form-inline active-cyan-4" action="/searching/" method="GET">
            <input class="form-control form-control-sm mr-3 w-75" type="text" name="su" value="{{ Request::query('su') }}" placeholder="Enter For Search" aria-label="Search">
                {{--  <a style="border: 1px solid white; padding: 1px 4px; border-radius: 5px;"><i class="fa fa-search white-text" aria-hidden="true"></i></a>  --}}
                {{-- <button type="submit" class="btn btn-info btn-sm">Search</button> --}}
        </form>
    </ul>
</nav>
    <!--/.Navbar-->

<script>
    $(".button-collapse").sideNav();
</script>
