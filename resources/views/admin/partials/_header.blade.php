    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin Panel</h3>
                <strong>AP</strong>
            </div>

            <ul class="list-unstyled components">
                <li><a class="{{ null == Request::query() ? 'active' : '' }}" href="/admin">
                    <i class="fa fa-home"></i>
                    Home
                </a></li>

                {{-- Pages --}}
                <li>
                    <a href="#pagesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-file-text-o"></i>
                        Pages
                    </a>
                    <ul class="collapse list-unstyled" id="pagesSubmenu">
                        <li><a href="{{ route('pages.index') }}">All Pages</a></li>
                        <li><a href="{{ route('pages.create') }}">Add New</a></li>
                    </ul>
                </li>

                {{-- Posts --}}
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-copy"></i>
                        Posts
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li><a href="{{ route('posts.index') }}">All Posts</a></li>
                        <li><a href="{{ route('posts.create') }}">Add New</a></li>
                    </ul>
                </li>

                {{--  Article  --}}
                {{-- <li>
                    <a class="{{ Request::is('articles') ? 'active' : '' }}" href="/articles">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    Articles
                </a></li> --}}

                {{-- Comments --}}

                <li>
                    <a href="{{ route('categories.index') }}">
                        <i class="fa fa-tag"></i>
                        <small>Categories</small>
                    </a>

                    <a href="{{ route('comments.index') }}">
                        <i class="fa fa-comments-o"></i>
                        <small>Comments</small>
                    </a>
                </li>

                <hr>

                {{--  @if( Helper::get_pages() )
                    @foreach( Helper::get_pages() as $page )
                        <li><a class="blog-nav-item {{ $page->id == Request::query('page_id') ? 'active' : '' }}" href="/?page_id={{ $page->id }}">{{ $page->post_title }}</a></li>
                    @endforeach
                @endif  --}}

                <hr>

                <li class="text-center unique-color">
                        <small class="text-muted light-blue-text"><i class="fa fa-copyright"></i>
                            created by Agif </small>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" style="background: url({{asset('img/admin/welcome4.jpg')}});background-size:cover; background-position:center; background-repeat:no-repeat;">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-align-justify"></i>
                    </button>

                    <div>
                        {{-- <h4>Search</h4> --}}
                        <form action="/search/" method="GET" class="form-inline active-cyan-4">
                            <input type="text" name="sa" value="{{ Request::query('sa') }}" placeholder="Enter For Search this site..." class="form-control form-control-sm mr-3 w-75"/>

                            {{-- <button type="submit" class="btn btn-info btn-sm">Search</button> --}}
                        </form>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link fa fa-caret-down" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- <div class="card">
                    <div class="card-body">
                        Hello
                    </div>
                </div>
        </div>
    </div> --}}
