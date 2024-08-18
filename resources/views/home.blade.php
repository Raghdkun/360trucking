<!-- resources/views/home.blade.php -->
@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <!-- Carousel Start -->
<div class="container-fluid p-0 pb-5">
    <div id="headerCarousel" class="carousel slide position-relative mb-5" data-bs-ride="carousel" style="height: auto;">
        <!-- Indicators/Dots -->
        <ol class="carousel-indicators">
            @foreach($carousels as $index => $carousel)
                <li data-bs-target="#headerCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        {{-- <div class="container-fluid p-0">

            </div> --}}
            <div id="headerCarousel" class="carousel slide carousel-fade position-relative mb-5" data-bs-ride="carousel" data-bs-interval="5000">
                <!-- Carousel Items -->
                
                @if(isset($carousels))
                @foreach($carousels as $carousel)
                <div class="carousel-inner">
                    @foreach($carousels as $index => $carousel)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            @include('partials.carousel-item', [
                                'img' => $carousel->image,
                                'title' => $carousel->title,
                                'desc' => $carousel->description,
                                'button_text' => $carousel->button_text,
                                'button_url' => $carousel->button_url,
                                'logo' => $settings->logo
                            ])
                        </div>
                    @endforeach
                @endforeach
            @endif
            
                </div>
                <!-- Custom CSS for responsive font sizes and arrow positioning -->
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

    /* Custom styles for carousel controls */
    .custom-carousel-control {
        width: 5%; /* Make controls narrower */
    }

    /* Position controls closer to the sides of the carousel */
    .carousel-control-prev, .carousel-control-next {
        top: 50%;
        transform: translateY(-50%);
        width: auto;
    }

    /* Custom positioning for larger screens */
    @media (min-width: 768px) {
        .carousel-control-prev {
            left: 15px; /* Closer to the left side */
        }
        .carousel-control-next {
            right: 15px; /* Closer to the right side */
        }
    }

    /* Custom positioning for mobile screens */
    @media (max-width: 768px) {
        .carousel-control-prev {
            left: 5px; /* Even closer to the left side on mobile */
        }
        .carousel-control-next {
            right: 5px; /* Even closer to the right side on mobile */
        }
    }
</style>
        <!-- Carousel Items -->
        {{-- <div class="carousel-inner">
            @foreach($carousels as $index => $carousel)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    @include('partials.carousel-item', [
                        'img' => $carousel->image,
                        'title' => $carousel->title,
                        'desc' => $carousel->description,
                        'button_text' => $carousel->button_text,
                        'button_url' => $carousel->button_url
                    ])
                </div>
            @endforeach
        </div> --}}


            </div>



                </div>

                <!-- Controls -->
                {{-- <a class="carousel-control-prev" href="#headerCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#headerCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a> --}}
            </div>
        </div>

        <!-- Controls -->
        {{-- <a class="carousel-control-prev" href="#headerCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#headerCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a> --}}
    </div>
</div>


    <!-- Carousel End -->
    {{-- @include('layouts.contact') --}}


    
    <!-- About Start -->
    @include('layouts.about')
    <!-- About End -->
    <div class="container mt-4 d-flex justify-content-center">
        <div class="card shadow-lg p-4" >
            <div class="card-body text-center">
                <p class="mb-4 text-dark" style="font-size: 1.25rem;">
                    If you'd like to schedule a meeting to discuss your needs or any other inquiries, feel free to book a meeting with us. We look forward to connecting with you!
                </p>
                <a href="{{ url('bookings/create') }}" class="btn btn-primary py-3 px-5" style="font-size: 1.25rem;">Book a Meeting</a>
            </div>
        </div>
    </div>
    

    <!-- Fact Start -->
    {{-- @include('partials.facts') --}}
    <!-- Fact End -->

    <!-- Service Start -->
    {{-- @include('partials.services') --}}
    <!-- Service End -->

    <!-- Feature Start -->
    {{-- @include('partials.features') --}}
    <!-- Feature End -->

    <!-- Pricing Start -->
    @include('layouts.pricing')
    <!-- Pricing End -->

    <!-- Quote Start -->
    {{-- @include('partials.quote') --}}
    <!-- Quote End -->

    <!-- Team Start -->
    {{-- @include('partials.team') --}}
    <!-- Team End -->

    <!-- Testimonial Start -->
    {{-- @include('partials.testimonial') --}}
    <!-- Testimonial End -->
@endsection
