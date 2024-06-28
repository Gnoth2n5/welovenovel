<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container" style="z-index: 20">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <span>
                <img src="{{ asset('images/logoz.jpg') }}" style="width: 300px;" alt="">
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('dashboard') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('shop.html') }}">
                        Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('why.html') }}">
                        Why Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('testimonial.html') }}">
                        Testimonial
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('contact.html') }}">Contact Us</a>
                </li>
            </ul>
            <div class="user_option">

                @if (Route::has('login'))
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="mr-3">
                            @csrf

                            <input type="submit" value="Logout"
                                class="btn waves-effect waves-light btn-rounded btn-outline-primary">
                        </form>

                        <a href="{{ url('view_cart') }}" class="btn btn-rounded btn-outline-success">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            
                            @if (Auth::check())
                                <span>[{{ $count_product_of_userId }}]</span>
                            @endif
                            
                            <span>Shop Cart</span>
                        </a>
                    @else
                        <a href=" {{ url('/login') }} ">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                Login
                            </span>
                        </a>

                        <a href=" {{ url('/register') }} ">
                            <i class="fa fa-vcard" aria-hidden="true"></i>
                            <span>
                                Register
                            </span>
                        </a>

                    @endauth
                @endif


            </div>
        </div>
    </nav>
</header>
