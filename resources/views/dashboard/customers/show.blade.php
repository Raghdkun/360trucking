@extends('layouts.dashboard')

@section('title', 'Customer Details')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Customer Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $customer->first_name }} {{ $customer->last_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone Number:</strong> {{ $customer->phone_number }}</p>
            <p><strong>Address:</strong> {{ $customer->address }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
            </form>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customers</a>
        </div>
    </div>
</div>
@endsection
