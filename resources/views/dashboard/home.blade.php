@extends('layouts.dashboard')

@section('title', 'Home')

@section('content')
<h1 class="mb-4">Home</h1>

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

<div class="card mb-4">
    <div class="card-header">
        Slider Settings
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addSlideModal">
            Add New Slide
        </button>
        <div class="row">
            @foreach($carousels as $carousel)
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('carousel.update', $carousel->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $carousel->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ $carousel->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="button_text" class="form-label">Button Text</label>
                                <input type="text" class="form-control" id="button_text" name="button_text" value="{{ $carousel->button_text }}">
                            </div>
                            <div class="mb-3">
                                <label for="button_url" class="form-label">Button URL</label>
                                <input type="text" class="form-control" id="button_url" name="button_url" value="{{ $carousel->button_url }}">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Change Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <small class="text-muted">Current Image:</small>
                                <div class="mt-2">
                                    <img src="{{ asset($carousel->image) }}" alt="Current Slide Image" class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
                                </div>
                            </div>

                            <!-- Buttons in the same row -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>

                        <!-- Separate form for Delete -->
                        <form action="{{ route('carousel.destroy', $carousel->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('partials.add-slide-modal')
@endsection
