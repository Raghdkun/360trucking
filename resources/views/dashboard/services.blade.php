<!-- resources/views/services.blade.php -->
@extends('layouts.main')

@section('title', 'Services')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Our Services</h6>
                <h1 class="mb-5">Explore Our Services</h1>
            </div>
            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item p-4">
                            <div class="overflow-hidden mb-4">
                                <img class="img-fluid" src="{{ asset($service->image) }}" alt="{{ $service->title }}">
                            </div>
                            <h4 class="mb-3">{{ $service->title }}</h4>
                            <p>{{ $service->description }}</p>
                            <a class="btn-slide mt-2" href="{{ route('services.show', $service->slug) }}"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
