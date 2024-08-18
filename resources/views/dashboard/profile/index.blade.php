@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')
<div class="container mt-4">
    <!-- Notification Section -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <!-- Profile Sidebar -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <!-- Fixing the image path -->
                    <img src="{{ $user->profile_image ? asset($user->profile_image) : 'https://via.placeholder.com/150' }}" alt="Profile Image" class="profile-img mb-3 rounded-circle" style="width: 150px;">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="text-muted">{{ $user->job ?? 'PNE' }}</p>
                    <div class="d-flex justify-content-center">
                        @if($user->twitter)
                            <a href="{{ $user->twitter }}" class="text-muted me-3"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($user->facebook)
                            <a href="{{ $user->facebook }}" class="text-muted me-3"><i class="fab fa-facebook"></i></a>
                        @endif
                        @if($user->instagram)
                            <a href="{{ $user->instagram }}" class="text-muted me-3"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if($user->linkedin)
                            <a href="{{ $user->linkedin }}" class="text-muted"><i class="fab fa-linkedin"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#overview" data-bs-toggle="tab">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#edit-profile" data-bs-toggle="tab">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#change-password" data-bs-toggle="tab">Change Password</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-3">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="overview">
                            <h5>About</h5>
                            <p>{{ $user->about ?? 'This is your profile page. You can view and update your profile details here.' }}</p>
                            <h5 class="mt-4">Profile Details</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Full Name:</strong> {{ $user->name }}</p>
                                    <p><strong>Company:</strong> {{ $user->company }}</p>
                                    <p><strong>Country:</strong> {{ $user->country }}</p>
                                    <p><strong>Address:</strong> {{ $user->address }}</p>
                                    <p><strong>Phone Number:</strong> {{ $user->phone }}</p>

                                </div>
                                <!-- Add additional profile details here -->
                            </div>
                        </div>
                        <!-- Edit Profile Tab -->
                        <div class="tab-pane fade" id="edit-profile">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-3">
                                    <label for="profile_image">Profile Image</label>
                                    <input type="file" name="profile_image" id="profile_image" class="form-control">
                                    @if($user->profile_image)
                                        <img src="{{ asset($user->profile_image) }}" alt="Profile Image" class="mt-2" style="max-width: 100px;">
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="about">About</label>
                                    <textarea name="about" id="about" class="form-control">{{ $user->about }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="company">Company</label>
                                    <input type="text" name="company" id="company" class="form-control" value="{{ $user->company }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="job">Job</label>
                                    <input type="text" name="job" id="job" class="form-control" value="{{ $user->job }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" class="form-control" value="{{ $user->country }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="twitter">Twitter Profile</label>
                                    <input type="url" name="twitter" id="twitter" class="form-control" value="{{ $user->twitter }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="facebook">Facebook Profile</label>
                                    <input type="url" name="facebook" id="facebook" class="form-control" value="{{ $user->facebook }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="instagram">Instagram Profile</label>
                                    <input type="url" name="instagram" id="instagram" class="form-control" value="{{ $user->instagram }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="linkedin">LinkedIn Profile</label>
                                    <input type="url" name="linkedin" id="linkedin" class="form-control" value="{{ $user->linkedin }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                        <!-- Change Password Tab -->
                        <div class="tab-pane fade" id="change-password">
                            <form action="{{ route('profile.change-password') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="new_password_confirmation">Re-enter New Password</label>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
