<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-4">
        <h2 class="mb-2 text-white">{{ $settings->website_name ?? '360Trucking' }}</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            @auth
            <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        @endauth
            <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
            <a href="{{ url('/services') }}" class="nav-item nav-link {{ Request::is('services') ? 'active' : '' }}">Services</a>
            <a href="{{ url('/pricing') }}" class="nav-item nav-link {{ Request::is('pricing') ? 'active' : '' }}">Pricing</a>
            <a href="{{ url('/contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
            <a href="{{ url('bookings/create') }}" class="nav-item nav-link {{ Request::is('bookings/create') ? 'active' : '' }}">bookings</a>

        </div>
        <h4 class="m-0 pe-lg-5 d-none d-lg-block">
            <i class="fa fa-headphones text-primary me-3"></i>{{ $settings->phone ?? '+199922395' }}
        </h4>
    </div>
</nav>

           {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ Request::is('pricing', 'features', 'quote', 'team', 'testimonial', '404') ? 'active' : '' }}" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{ url('/pricing') }}" class="dropdown-item {{ Request::is('pricing') ? 'active' : '' }}">Pricing Plan</a>
                    <a href="{{ url('/features') }}" class="dropdown-item {{ Request::is('features') ? 'active' : '' }}">Features</a>
                    <a href="{{ url('/quote') }}" class="dropdown-item {{ Request::is('quote') ? 'active' : '' }}">Free Quote</a>
                    <a href="{{ url('/team') }}" class="dropdown-item {{ Request::is('team') ? 'active' : '' }}">Our Team</a>
                    <a href="{{ url('/testimonial') }}" class="dropdown-item {{ Request::is('testimonial') ? 'active' : '' }}">Testimonial</a>
                    <a href="{{ url('/404') }}" class="dropdown-item {{ Request::is('404') ? 'active' : '' }}">404 Page</a>
                </div>
            </div> --}}
