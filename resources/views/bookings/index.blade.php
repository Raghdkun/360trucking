@extends('layouts.main')

@section('title', 'All Bookings')

@section('content')
<div class="container">
    <h1 class="my-4">All Bookings</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Booking Title</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</td>
                    <td>{{ $booking->title }}</td>
                    <td>{{ $booking->start_time }}</td>
                    <td>{{ $booking->end_time }}</td>
                    <td>{{ $booking->is_confirmed ? 'Confirmed' : 'Pending' }}</td>
                    <td>
                        <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
