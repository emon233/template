<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">sazid.hossain.1433@gmail.com</a>
            <i class="bi bi-phone-fill phone-icon"></i> +880 1311 022920
        </div>
        <div class="social-links d-none d-md-block">
            <a href="https://twitter.com/MdSazidH" class="twitter" target="__blank"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/emon.ku.cse/" class="facebook" target="__blank"><i class="bi bi-facebook"></i></a>
            <a href="https://www.linkedin.com/in/md-sazid-62724319b/" class="linkedin" target="__blank"><i class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{ route('welcome') }}">{{ SITE_NAME }}</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            @if(Route::has('signin'))
            <ul>
                @auth
                <li>
                    <a class="nav-link @if(isset($menu) && $menu == 'home') active @endif" href="{{ route('home') }}">
                        {{ __('Home') }}
                    </a>
                </li>
                <li>
                    <a class="getstarted" id="btn-signout" href="#">
                        {{ __('Signout') }}
                    </a>
                    <form id="form-signout" method="post" action="{{ route('signout') }}" style="display:none;">
                        @csrf
                    </form>
                </li>
                @else
                <li><a class="getstarted" href="{{ route('signin') }}">{{ __('Signin') }}</a></li>
                <li><a class="getstarted" href="{{ route('signup') }}">{{ __('Signup') }}</a></li>
                @endauth

            </ul>
            @endif
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
