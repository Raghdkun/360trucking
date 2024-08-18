<!-- resources/views/partials/footer.blade.php -->
<div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Address</h4>
                @if(isset($settings))
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $settings->phone ?? '+199922395' }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $settings->email ?? 'jaden@pneunited.com' }}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="{{ $settings->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ $settings->youtube_link }}"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ $settings->instagram_link }}"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ $settings->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                </div>
                @endif
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Services</h4>
                <a class="btn btn-link" href="">Air Freight</a>
                <a class="btn btn-link" href="">Sea Freight</a>
                <a class="btn btn-link" href="">Road Freight</a>
                <a class="btn btn-link" href="">Logistic Solutions</a>
                <a class="btn btn-link" href="">Industry solutions</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Our Services</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>

            <!-- Logo Section -->
            <div class="col-lg-3 col-md-6 text-center">
                @if(isset($settings->logo))
                    <img src="{{ asset($settings->logo) }}" alt="{{ $settings->website_name }}" class="img-fluid" style="max-width: 200px;">
                @else
                    <img src="{{ asset('images/default-logo.png') }}" alt="Default Logo" class="img-fluid" style="max-width: 200px;">
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">{{ $settings->website_name ?? 'Trucking360' }}</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    {{-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> --}}
                    {{-- </br>Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
