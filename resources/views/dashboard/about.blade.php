@extends('layouts.dashboard')

@section('title', 'About')

@section('content')
    <h1 class="mb-4">About Page</h1>

    <!-- Notification -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- About Us Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>About Us</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $about->title ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $about->description ?? '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($about && $about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="Current Image" class="img-thumbnail mt-2" style="width: 150px;">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="button_url" class="form-label">Button URL</label>
                    <input type="url" class="form-control" id="button_url" name="button_url" value="{{ $about->button_url ?? '' }}">
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>

            @if(empty($about))
                <p class="text-muted mt-3">Currently, there is no "About Us" content. Please fill out the form above to add content.</p>
            @endif
        </div>
    </div>

    <!-- Features Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>Our Features</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.about.features.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="icon" class="form-label">Icon (FontAwesome or SVG path)</label>
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

            <h3 class="mt-5">Existing Features</h3>
            @if (isset($features))
                @if($features->isEmpty())
                    <p class="text-muted">No features added yet.</p>
                @else
                    @foreach($features as $feature)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <i class="{{ $feature->icon }}"></i>
                                <strong>{{ $feature->title }}</strong> - {{ $feature->description }}
                            </div>
                            <form action="{{ route('dashboard.about.features.destroy', $feature->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>

    <!-- Team Members Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>Our Team</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.about.team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <div class="mb-3">
                    <label for="facebook_link" class="form-label">Facebook Link</label>
                    <input type="url" class="form-control" id="facebook_link" name="facebook_link">
                </div>
                <div class="mb-3">
                    <label for="twitter_link" class="form-label">X Link</label>
                    <input type="url" class="form-control" id="twitter_link" name="twitter_link">
                </div>
                <div class="mb-3">
                    <label for="instagram_link" class="form-label">Instagram Link</label>
                    <input type="url" class="form-control" id="instagram_link" name="instagram_link">
                </div>
                <button type="submit" class="btn btn-success">Add Team Member</button>
            </form>

            <h3 class="mt-5">Existing Team Members</h3>
            @if($teamMembers->isEmpty())
                <p class="text-muted">No team members added yet.</p>
            @else
                @foreach($teamMembers as $teamMember)
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <img src="{{ asset('storage/' . $teamMember->image) }}" alt="{{ $teamMember->name }}" class="img-thumbnail" style="width: 50px; height: 50px;">
                            <strong>{{ $teamMember->name }}</strong> - {{ $teamMember->designation }}
                        </div>
                        <form action="{{ route('dashboard.about.team.destroy', $teamMember->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
