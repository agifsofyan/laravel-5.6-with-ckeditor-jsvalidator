    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="color-block blue-gradient z-depth-2">
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
                        <li>
                            <a href="{{ route('pages.index') }}"><i class="fa fa-list"></i>
                                <small>All Pages</small>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.create') }}"><i class="fa fa-plus"></i>
                                <small>Add New</small>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.trash') }}"><i class="fa fa-trash"></i>
                                <small>Trash</small>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Posts --}}
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-copy"></i>
                        Posts
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ route('posts.index') }}"><i class="fa fa-list"></i>
                                <small>All Posts</small>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts.create') }}"><i class="fa fa-plus"></i>
                                <small>Add New</small>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts.trash') }}"><i class="fa fa-trash"></i>
                                <small>Trash</small>
                            </a>
                        </li>
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
                    <a href="#CategorySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-tag"></i>
                        Category
                    </a>
                    <ul class="collapse list-unstyled" id="CategorySubmenu">
                        <li>
                            <a href="{{ route('categories.index') }}"><i class="fa fa-list"></i>
                                <small>All Category</small>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories.create') }}"><i class="fa fa-plus"></i>
                                <small>Add New</small>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories.trash') }}"><i class="fa fa-trash"></i>
                                <small>Trash</small>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Maaf sementara link di nonaktifkan" style="cursor: not-allowed;">
                        <a style="pointer-events: none;" type="button" disabled href="{{ route('comments.index') }}">
                            <i class="fa fa-comments-o"></i>
                            <small>Comments</small>
                        </a>
                    </span>


                </li>

                <hr>

                {{--  @if( Helper::get_pages() )
                    @foreach( Helper::get_pages() as $page )
                        <li><a class="blog-nav-item {{ $page->id == Request::query('page_id') ? 'active' : '' }}" href="/?page_id={{ $page->id }}">{{ $page->post_title }}</a></li>
                    @endforeach
                @endif  --}}

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

                    {{-- <div>
                        <form action="/search/" method="GET" class="form-inline active-cyan-4">
                            <input type="text" name="sa" value="{{ Request::query('sa') }}" placeholder="Enter For Search this site..." class="form-control form-control-sm mr-3 w-75"/>
                        </form>
                    </div> --}}

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                {{--  <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>  --}}
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
