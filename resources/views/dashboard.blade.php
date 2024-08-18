@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    {{-- <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Coming Soon</p>
                    <h6 class="mb-0">Coming Soon</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Coming Soon</p>
                    <h6 class="mb-0">Coming Soon</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Coming Soon</p>
                    <h6 class="mb-0">Coming Soon</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Coming Soon</p>
                    <h6 class="mb-0">Coming Soon</h6>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row g-4">
        <!-- Other content here -->
    </div>


    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h5 class="mb-4">Visitors Activity Logs</h5>
                @include('partials.visitors-table')
            </div>
        </div>
    </div>

    <!-- User Logs Section -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h5 class="mb-4">Users Activity Logs</h5>
                @include('partials.logs-table')
            </div>
        </div>
    </div>
 
    {{-- enable bootstrap
    composer require laravel/ui --dev
    php artisan ui bootstrap --}}
    <!-- Add more content here -->
@endsection

