<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Trucking360 Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .nav-tabs .nav-link.active {
            border-color: #dee2e6 #dee2e6 #fff;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Profile Sidebar -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://via.placeholder.com/150" alt="Profile Image" class="profile-img mb-3">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="text-muted">Web Designer</p>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="text-muted me-3"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-muted me-3"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-muted me-3"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-muted"><i class="fab fa-linkedin"></i></a>
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
                                <a class="nav-link" href="#settings" data-bs-toggle="tab">Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#change-password" data-bs-toggle="tab">Change Password</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-3">
                            <!-- Overview Tab -->
                            <div class="tab-pane fade show active" id="overview">
                                @yield('profile-content')
                            </div>
                            <!-- Edit Profile Tab -->
                            <div class="tab-pane fade" id="edit-profile">
                                <!-- Add your Edit Profile content here -->
                            </div>
                            <!-- Settings Tab -->
                            <div class="tab-pane fade" id="settings">
                                <!-- Add your Settings content here -->
                            </div>
                            <!-- Change Password Tab -->
                            <div class="tab-pane fade" id="change-password">
                                <!-- Add your Change Password content here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
