@extends('layouts.dashboard')

@section('title', $service ? 'Edit Service' : 'Add New Service')

@section('content')
    <h1 class="mb-4">{{ $service ? 'Edit Service' : 'Add New Service' }}</h1>

    <form action="{{ $service ? route('dashboard.services.update', $service->id) : route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($service) @method('PUT') @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $service->title ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $service->description ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content">{{ $service->content ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="button_url" class="form-label">Button URL</label>
            <input type="" class="form-control" id="button_url" name="button_url" value="{{ $service->button_url ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-success">{{ $service ? 'Update Service' : 'Add Service' }}</button>
    </form>

    <!-- Include a simple HTML editor like TinyMCE or CKEditor -->
    <script src="https://cdn.tiny.cloud/1/r1racrxd2joy9wp9xp9sj91ka9j4m3humenifqvwtx9s6i3y/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#content',
            plugins: 'link image code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
        });
    </script>
@endsection
