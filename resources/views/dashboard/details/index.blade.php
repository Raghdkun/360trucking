@extends('layouts.dashboard')

@section('title', 'AFP Details')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 d-flex justify-content-between align-items-center">
        AFP Details
        <!-- Dropdown for Export -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Export
            </button>
            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                <li><a class="dropdown-item" href="{{ route('details.export', 'csv') }}">Export as CSV</a></li>
                <li><a class="dropdown-item" href="{{ route('details.export', 'xlsx') }}">Export as Excel</a></li>
            </ul>
        </div>
    </h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('details.create') }}" class="btn btn-primary mb-4">Add New AFP Details</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 50px;">#</th>
                    <th>Customer Name</th>
                    <th>Owner Name</th>
                    <th>Office Full Address</th>
                    <th>Yard Full Address</th>
                    <th>Trucks</th>
                    <th>Drivers</th>
                    <th>Amazon Rating</th>
                    <th>Dispatch Method</th>
                    <th>Main Services</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detail->customer->first_name }} {{ $detail->customer->last_name }}</td>
                        <td>{{ $detail->owner_name }}</td>
                        <td>{{ $detail->office_full_address }}</td>
                        <td>{{ $detail->yard_full_address }}</td>
                        <td>{{ $detail->number_of_trucks }}</td>
                        <td>{{ $detail->number_of_drivers }}</td>
                        <td>{{ $detail->amazon_scorecard_rating }}</td>
                        <td>{{ ucfirst($detail->dispatch_handling_method) }}</td>
                        <td>{{ $detail->main_services }}</td>
                        <td>
                            <a href="{{ route('details.edit', $detail->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('details.destroy', $detail->id) }}" method="POST" style="display:inline;">
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
