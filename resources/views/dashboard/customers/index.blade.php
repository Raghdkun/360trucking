@extends('layouts.dashboard')

@section('title', 'Customers')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Customers</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-4">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Export
            </button>
            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                <li><a class="dropdown-item" href="{{ route('customers.export', 'xlsx') }}">Export as Excel</a></li>
                <li><a class="dropdown-item" href="{{ route('customers.export', 'csv') }}">Export as CSV</a></li>
            </ul>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone_number }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
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
