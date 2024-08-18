@extends('layouts.dashboard')

@section('title', 'Add Customer')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Add Customer</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ old('phone_number') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
    </div>
</div>
@endsection
