@extends('layouts.dashboard')

@section('title', 'Add New Slide')

@section('content')


    <h1 class="mb-4">Add New Slide</h1>

    <div class="card mb-4">
        <div class="card-header">
            New Slide
        </div>
        <div class="card-body">
            <form action="{{ route('carousel.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="button_text" class="form-label">Button Text</label>
                    <input type="text" class="form-control" id="button_text" name="button_text">
                </div>
                <div class="mb-3">
                    <label for="button_url" class="form-label">Button URL</label>
                    <input type="text" class="form-control" id="button_url" name="button_url">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image URL</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-success">Add Slide</button>
            </form>
        </div>
    </div>
@endsection
