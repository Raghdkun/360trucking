@extends('layouts.dashboard')

@section('title', 'Bookings')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Bookings</h1>
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

    <!-- Responsive Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width: 5%;">#</th>
                    <th scope="col" style="width: 15%;">Customer</th>
                    <th scope="col" style="width: 20%;">Domicile</th>
                    <th scope="col" style="width: 20%;">Description</th>
                    <th scope="col" style="width: 15%;">Date</th>
                    <th scope="col" style="width: 10%;">Status</th>
                    <th scope="col" style="width: 15%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</td>
                    <td>{{ $booking->domicile }}</td>
                    <td>{{ $booking->description }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>
                        <span style="
                        background-color: {{ $booking->is_confirmed == 'confirmed' ? '#28a745' : ($booking->is_confirmed == 'canceled' ? '#dc3545' : '#ffc107') }};
                        color: white;
                        padding: 0.25em 0.75em;
                        border-radius: 0.5rem;
                        display: inline-block;">
                        {{ ucfirst($booking->is_confirmed) }}
                        </span>
                    </td>

                    <td>
                        <a href="{{ route('dashboard.bookings.edit', $booking->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('dashboard.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
