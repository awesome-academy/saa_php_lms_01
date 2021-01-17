<header id="header-v1" class="navbar-wrapper inner-navbar-wrapper">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="row">
                    <div class="col-md-3">
                        <div class="navbar-header">
                            <div class="navbar-brand">
                                <h1>
                                    <a href="index-2.html">
                                        <img src="{{ asset('img/libraria-logo-v1.png')}}" alt="LIBRARIA" />
                                    </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <!-- Header Topbar -->
                        <div class="header-topbar hidden-sm hidden-xs">
                            <div class="row">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6">
                                    @if(Auth::guard('web')->check())
                                        <div class="topbar-links">
                                            <a id="user-name-home" style="color:#fff"><i class="fa fa-lock"></i>{{Auth::guard('web')->user()->name}}</a>
                                            <ul class="setting-user">
                                                <li class="item-setting">
                                                    <a href="{{ route('user\logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('user\logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                                <li class="item-setting">
                                                    <a href="{{route('user\profile',Auth::id())}}">{{ __('Profile') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        @else
                                        <div class="topbar-links">
                                            <a href="/login"><i class="fa fa-lock"></i>{{ __('Login') }}</a>
                                            <a href="/register"><i class="fa fa-lock"></i>{{ __('Register') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="navbar-collapse hidden-sm hidden-xs">
                            <ul class="nav navbar-nav menu-home">
                                <li class=" active">
                                    <a href="/">Home</a>
                            
                                </li>
                                <li>
                                    <a >Books &amp; Media</a>
                                </li>
                                <li>
                                    <a>News &amp; Events</a>
                                </li>
                            
                                <li><a href="services.html">Services</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu hidden-lg hidden-md">
                    <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                    <div id="mobile-menu">
                        <ul>
                            <li class="mobile-title">
                                <h4>Navigation</h4>
                                <a href="#" class="close"></a>
                            </li>
                            <li>
                                <a href="index-2.html">Home</a>
                                <ul>
                                    <li><a href="index-2.html">Home V1</a></li>
                                    <li><a href="home-v2.html">Home V2</a></li>
                                    <li><a href="home-v3.html">Home V3</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="books-media-list-view.html">Books &amp; Media</a>
                                <ul>
                                    <li><a href="books-media-list-view.html">Books &amp; Media List View</a></li>
                                    <li><a href="books-media-gird-view-v1.html">Books &amp; Media Grid View V1</a></li>
                                    <li><a href="books-media-gird-view-v2.html">Books &amp; Media Grid View V2</a></li>
                                    <li><a href="books-media-detail-v1.html">Books &amp; Media Detail V1</a></li>
                                    <li><a href="books-media-detail-v2.html">Books &amp; Media Detail V2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="news-events-list-view.html">News &amp; Events</a>
                                <ul>
                                    <li><a href="news-events-list-view.html">News &amp; Events List View</a></li>
                                    <li><a href="news-events-detail.html">News &amp; Events Detail</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="signin.html">Signin/Register</a></li>
                                    <li><a href="404.html">404/Error</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog Grid View</a></li>
                                    <li><a href="blog-detail.html">Blog Detail</a></li>
                                </ul>
                            </li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>