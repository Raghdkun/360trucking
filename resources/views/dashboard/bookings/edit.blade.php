@extends('layouts.dashboard')

@section('title', 'Edit Booking')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Booking</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
            <form action="{{ route('dashboard.bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="domicile" class="form-label">Domicile</label>
                    <input type="domicile" name="domicile" class="form-control" id="domicile" value="{{ old('domicile', $booking->domicile) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="date" class="form-label">Meeting Date</label>
                    <input type="date" name="date" class="form-control" id="date" value="{{ old('date', $booking->date) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description">{{ old('description', $booking->description) }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="is_confirmed" class="form-label">Status</label>
                    <select name="is_confirmed" id="is_confirmed" class="form-control" required>
                        <option value="pending" {{ old('is_confirmed', $booking->is_confirmed) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ old('is_confirmed', $booking->is_confirmed) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="canceled" {{ old('is_confirmed', $booking->is_confirmed) == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Update Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
