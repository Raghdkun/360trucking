@extends('layouts.dashboard')

@section('title', 'Features')

@section('content')
    <h1 class="mb-4">Features</h1>
    <form action="{{ route('dashboard.features.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="icon" class="form-label">Icon</label>
            <input type="text" class="form-control" id="icon" name="icon" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Feature</button>
    </form>

    <h2 class="mt-5">Existing Features</h2>
    @foreach($features as $feature)
        <div class="d-flex justify-content-between align-items-center">
            <div>{{ $feature->title }}</div>
            <form action="{{ route('dashboard.features.destroy', $feature->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endforeach
@endsection
