<!-- resources/views/errors/404.blade.php -->
@extends('layouts.main')

@section('title', 'Notification')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">
                {{ $header ?? 'Notification' }}
            </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{ $breadcrumb ?? 'Message' }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Notification Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    
                        <i class="bi bi-check-circle display-1 text-success"></i>
                        <h1 class="display-1">Success</h1>
                        <h1 class="mb-4">{{ $header ?? 'Operation Successful' }}</h1>
                        <p class="mb-4">{{ $message ?? 'The operation completed successfully.' }}</p>
                        <a class="btn btn-success rounded-pill py-3 px-5" href="{{ url('/') }}">Go Back To Home</a>
                    {{-- @elseif(isset($error))
                        <i class="bi bi-exclamation-triangle display-1 text-danger"></i>
                        <h1 class="display-1">Error</h1>
                        <h1 class="mb-4">{{ $header ?? 'Operation Failed' }}</h1>
                        <p class="mb-4">{{ $message ?? 'There was an issue with the operation.' }}</p>
                        <a class="btn btn-danger rounded-pill py-3 px-5" href="{{ url('/') }}">Go Back To Home</a>
                    @else
                        <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                        <h1 class="display-1">404</h1>
                        <h1 class="mb-4">Page Not Found</h1>
                        <p class="mb-4">We’re sorry, the page you have looked for does not exist on our website! Maybe go to our home page or try to use a search?</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ url('/') }}">Go Back To Home</a> --}}
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Notification End -->
@endsection
