@extends('layouts.main')

@section('title', 'About Us')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        @if(isset($about->image))
                            <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('storage/' . $about->image) }}" style="object-fit: cover;" alt="About Image">
                        @else
                            <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('img/about.jpg') }}" style="object-fit: cover;" alt="About Image">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-3">About Us</h6>
                    <h1 class="mb-5">{{ $about->title ?? 'Quick Transport and Logistics Solutions' }}</h1>
                    <p class="mb-5">{{ $about->description ?? 'Default description about the company.' }}</p>
                    <div class="row g-4 mb-5">
                        @if (isset($features) && !$features->isEmpty())
                            @foreach($features as $feature)
                                <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-8-circle-fill fa-3x text-primary mb-3" viewBox="0 0 16 16">
                                        <path d="{{ $feature->icon }}"/>
                                    </svg>
                                    <h5>{{ $feature->title }}</h5>
                                    <p class="m-0">{{ $feature->description }}</p>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">No features added yet.</p>
                        @endif
                    </div>
                    @isset($about)
                    @if($about->button_url)
                        <a href="{{ $about->button_url }}" class="btn btn-primary py-3 px-5">Explore More</a>
                    @endif
                    @endisset

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Our Team</h6>
                <h1 class="mb-5">Expert Team Members</h1>
            </div>
            <div class="row g-4">
                @if (isset($teamMembers) && !$teamMembers->isEmpty())
                    @foreach($teamMembers as $teamMember)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="team-item p-4">
                                <div class="overflow-hidden mb-4">
                                    <img class="img-fluid" src="{{ asset('storage/' . $teamMember->image) }}" alt="{{ $teamMember->name }}">
                                </div>
                                <h5 class="mb-0">{{ $teamMember->name }}</h5>
                                <p>{{ $teamMember->designation }}</p>
                                <div class="btn-slide mt-1">
                                    <i class="fa fa-share"></i>
                                    <span>
                                        @if($teamMember->facebook_link)
                                            <a href="{{ $teamMember->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if($teamMember->twitter_link)
                                            <a href="{{ $teamMember->twitter_link }}"><i class="fab fa-twitter"></i></a>
                                        @endif
                                        @if($teamMember->instagram_link)
                                            <a href="{{ $teamMember->instagram_link }}"><i class="fab fa-instagram"></i></a>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">No team members added yet.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
