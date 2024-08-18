<!-- resources/views/partials/carousel-item.blade.php -->
{{-- <div class="container-fluid p-0 pb-5">
    <div class="owl-carousel header-carousel position-relative mb-5">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset($img) }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Transport & Logistics Solution</h5>
                            <h1 class="display-3 text-white animated slideInDown mb-4">#1 Place For Your <span class="text-primary">Logistics</span> Solution</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
<!-- resources/views/partials/carousel-item.blade.php -->
<div class="owl-carousel-item position-relative">
    <img class="img-fluid" src="{{ asset($img) }}" alt="Carousel Image">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(6, 3, 21, .5);">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-12 col-md-10 col-lg-5 text-left" style="padding-left: 15px;">
                     <!-- Display Logo -->
                     @if(!empty($logo))
                     <img src="{{ asset($logo) }}" alt="Logo" class="mb-3" style="max-width: 150px;">
                 @endif
                    @if($title)
                        <h1 class="text-white animated fadeInUp mb-2 title-text">{{ $title }}</h1>
                    @endif
                    @if($desc)
                        <!-- Hide description on mobile view -->
                        <p class="text-white mb-4 animate__animated animate__fadeIn desc-text d-none d-md-block">{{ $desc }}</p>
                    @endif
                    @if($button_text && $button_url)
                        <a href="{{ $button_url }}" class="btn btn-primary py-2 px-3 mt-2 animate__animated animate__bounceIn" style="font-size: 1rem;">{{ $button_text }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Custom CSS for responsive font sizes -->
<style>
    /* Default font sizes for larger screens */
    .title-text {
        font-size: 2rem;
        font-weight: bold;
    }

    .desc-text {
        font-size: 1.25rem;
    }

    /* Adjust font sizes for smaller screens */
    @media (max-width: 576px) {
        .title-text {
            font-size: 1.5rem;
        }

        .desc-text {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .title-text {
            font-size: 1.75rem;
        }

        .desc-text {
            font-size: 1.125rem;
        }
    }
</style>
