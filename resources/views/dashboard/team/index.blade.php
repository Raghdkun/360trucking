@extends('layouts.dashboard')

@section('title', 'Team Members')

@section('content')
    <h1 class="mb-4">Team Members</h1>
    <form action="{{ route('dashboard.team.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="social_links" class="form-label">Social Links (JSON Format)</label>
            <textarea class="form-control" id="social_links" name="social_links"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Team Member</button>
    </form>

    <h2 class="mt-5">Existing Team Members</h2>
    @foreach($teamMembers as $teamMember)
        <div class="d-flex justify-content-between align-items-center">
            <div>{{ $teamMember->name }} - {{ $teamMember->designation }}</div>
            <form action="{{ route('dashboard.team.destroy', $teamMember->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endforeach
@endsection
