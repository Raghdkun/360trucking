@extends('layouts.main')

@section('title', 'Book a Meeting')

@section('content')

<div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container mt-5">

    <!-- Booking Form -->
    <div id="bookingForm" class="mt-4">
        <h3>Enter Your Details</h3>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Meeting Date</label>
                <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}" required>
            </div>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name') }}" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ old('phone_number') }}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" required>
            </div>

            <div class="form-group">
                <label for="domicile">Domicile</label>
                <input type="text" name="domicile" class="form-control" id="domicile" value="{{ old('domicile') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Book Meeting</button>
        </form>
    </div>
</div>
@endsection
