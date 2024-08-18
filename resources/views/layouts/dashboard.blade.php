<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Dashboard') - {{ $settings->website_name ?? '360Trucking' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/dashboard-bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/dashboard-styles.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3 d-flex flex-column">
            <nav class="navbar bg-light navbar-light flex-grow-1 d-flex flex-column">
                @isset($settings)
                <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>{{ $settings->website_name ?? '360Trucking' }}</h3>
                </a>
                @endisset
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100 flex-grow-1">
                    <!-- Dashboard Link -->
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link small {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                    </a>
        
                    <!-- Divider -->
                    <hr class="dropdown-divider text-grey mx-2">
        
                    <!-- Generals Section Header -->
                    <a href="{{ route('dashboard.generals') }}" class="nav-item nav-link small {{ Request::routeIs('dashboard.generals') ? 'active' : '' }}">
                        <i class="fa fa-th-large me-2"></i>Generals
                    </a>
        
                    <!-- Home Link -->
                    <a href="{{ route('dashboard.home') }}" class="nav-item nav-link small {{ Request::routeIs('dashboard.home') ? 'active' : '' }}">
                        <i class="fa fa-home me-2"></i>Home
                    </a>
        
                    <!-- About Link -->
                    <a href="{{ route('dashboard.about') }}" class="nav-item nav-link small {{ Request::routeIs('dashboard.about') ? 'active' : '' }}">
                        <i class="fa fa-info-circle me-2"></i>About
                    </a>
        
                    <!-- Pricing Link -->
                    <a href="{{ route('dashboard.pricing') }}" class="nav-item nav-link small {{ Request::routeIs('dashboard.pricing') ? 'active' : '' }}">
                        <i class="fa fa-dollar-sign me-2"></i>Pricing
                    </a>
        
                    <!-- Contact Link -->
                    <a href="{{ route('dashboard.contact') }}" class="nav-item nav-link small {{ Request::routeIs('dashboard.contact') ? 'active' : '' }}">
                        <i class="fa fa-envelope me-2"></i>Contact
                    </a>
        
                    <!-- Services Link -->
                    <a href="{{ route('dashboard.services.index') }}" class="nav-item nav-link small {{ Request::routeIs('dashboard.services.index') ? 'active' : '' }}">
                        <i class="fa fa-cogs me-2"></i>Services
                    </a>
        
                    <!-- Divider -->
                    <hr class="dropdown-divider text-grey mx-2">
        
                    <a href="{{ route('dashboard.bookings.index') }}" class="nav-item nav-link small {{ Request::routeIs('dashboard.bookings.index') ? 'active' : '' }}">
                        <i class="fa fa-calendar-alt me-2"></i>Bookings
                    </a>
        
                    <a href="{{ route('customers.index') }}" class="nav-item nav-link small {{ Request::routeIs('customers.index') ? 'active' : '' }}">
                        <i class="fa fa-users me-2"></i>Customers
                    </a>
                    <a href="{{ route('details.index') }}" class="nav-item nav-link small {{ Request::routeIs('details.index') ? 'active' : '' }}">
                        <i class="fa fa-info-circle me-2"></i>AFP Details
                    </a>
                </div>
        
                <!-- Website Button -->
                <div class="mt-auto text-center">
                    <a href="{{ url('/') }}" class="btn btn-outline-primary m-2">
                        <i class="fa fa-globe me-2"></i>Website
                    </a>
                </div>
            </nav>
        </div>
        
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0 m-2 p-10">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <span class="badge bg-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <h6 class="dropdown-header">Notifications</h6>
                            <div class="list-group">
                                @foreach(Auth::user()->notifications()->latest()->take(5)->get() as $notification)
                                <a href="{{ $notification->url }}" class="list-group-item list-group-item-action {{ $notification->is_read ? '' : 'bg-light' }}">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">{{ $notification->title }}</h6>
                                        <small>{{ $notification->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1">{{ $notification->message }}</p>
                                </a>
                                @endforeach
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="{{ route('notifications.index') }}" class="btn btn-link">View All Notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item dropdown ms-3">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                            <!-- Profile Image -->
                            <img 
                                src="{{ Auth::user()->profile_image ? asset( Auth::user()->profile_image) : 'https://via.placeholder.com/40' }}" 
                                alt="Profile Image" 
                                class="rounded-circle me-2" 
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <div class="card">
                                <a href="{{ route('profile.show') }}" class="dropdown-item">My Profile</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <script>
        document.addEventListener('DOMContentLoaded', function() {
    const notificationDropdown = document.querySelector('.nav-item.dropdown .nav-link');
    const badge = document.querySelector('.nav-item.dropdown .badge');

    notificationDropdown.addEventListener('click', function() {
        fetch('{{ route('notifications.markAsRead') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        }).then(response => response.json()).then(data => {
            if (data.success) {
                badge.textContent = '0';
            }
        });
    });
});


            </script>
            <style>
                .dropdown-menu {
                    min-width: 300px;
                }
            </style>
            
            <!-- Navbar End -->

            <!-- Main Content Start -->
            <div class="container-fluid pt-4 px-4">
                @yield('content')
            </div>
            <!-- Main Content End -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        @isset($settings)
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">{{ $settings->website_name ?? 'Trucking360' }}</a>, All Right Reserved.
                        </div>
                        @endisset
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            made with <svg xmlns="http://www.w3.org/2000/svg" style="color: red" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                              </svg>
                            BY PMD
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>

    <!-- JavaScript Libraries -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/dashboard-main.js') }}"></script>
</body>

</html>
