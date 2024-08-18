<!-- resources/views/dashboard/generals.blade.php -->
@extends('layouts.dashboard')

@section('title', 'Generals')

@section('content')
    <h1 class="mb-4">Generals</h1>

    <!-- Notification -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Spinner -->
    <div id="spinner" class="d-none position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-white bg-opacity-75">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('dashboard.generals.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="website_name" class="form-label">Website Name</label>
            <input type="text" class="form-control" id="website_name" name="website_name" value="{{ $settings->website_name ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $settings->description ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags" value="{{ $settings->tags ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $settings->phone ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $settings->address ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $settings->email ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="facebook_link" class="form-label">Facebook Link</label>
            <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ $settings->facebook_link ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="youtube_link" class="form-label">YouTube Link</label>
            <input type="url" class="form-control" id="youtube_link" name="youtube_link" value="{{ $settings->youtube_link ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="instagram_link" class="form-label">Instagram Link</label>
            <input type="url" class="form-control" id="instagram_link" name="instagram_link" value="{{ $settings->instagram_link ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="linkedin_link" class="form-label">LinkedIn Link</label>
            <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ $settings->linkedin_link ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="google_map_key" class="form-label">Google Maps API Key</label>
            <input type="text" class="form-control" id="google_map_key" name="google_map_key" value="{{ $settings->google_map_key ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Website Logo (PNG only)</label>
            <input type="file" class="form-control" id="logo" name="logo">
            @if(isset($settings->logo))
                <small>Current Logo:</small>
                <img src="{{ asset($settings->logo) }}" alt="Website Logo" style="max-width: 150px; margin-top: 10px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const spinner = document.getElementById('spinner');

            form.addEventListener('submit', function() {
                spinner.classList.remove('d-none');
            });
        });
    </script>
@endsection
