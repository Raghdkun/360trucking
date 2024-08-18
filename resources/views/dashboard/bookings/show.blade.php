@extends('layouts.dashboard')

@section('title', 'Booking Details')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Booking Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $booking->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Customer:</strong> {{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</p>
            <p><strong>Email:</strong> {{ $booking->customer->email }}</p>
            <p><strong>Phone Number:</strong> {{ $booking->customer->phone_number }}</p>
            <p><strong>Date:</strong> {{ $booking->date }}</p>
            <p><strong>Description:</strong> {{ $booking->description }}</p>
            <p><strong>Status:</strong>
                <span style="background-color: {{ $booking->is_confirmed == 'confirmed' ? '#28a745' : ($booking->is_confirmed == 'canceled' ? '#dc3545' : '#ffc107') }}; color: white; padding: 0.25em 0.75em; border-radius: 0.5rem;">
                    {{ ucfirst($booking->is_confirmed) }}
                </span>
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('dashboard.bookings.edit', $booking->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('dashboard.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
            </form>
            <a href="{{ route('dashboard.bookings.index') }}" class="btn btn-secondary">Back to Bookings</a>
        </div>
    </div>
</div>
@endsection
