@extends('layouts.dashboard')

@section('title', 'Add AFP Details')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Add AFP Details</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('details.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Customer</label>
                        <select name="customer_id" id="customer_id" class="form-control" required>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="owner_name" class="form-label">Owner Name</label>
                        <input type="text" name="owner_name" class="form-control" id="owner_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="office_full_address" class="form-label">Office Full Address</label>
                        <textarea name="office_full_address" class="form-control" id="office_full_address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="yard_full_address" class="form-label">Yard Full Address</label>
                        <textarea name="yard_full_address" class="form-control" id="yard_full_address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="number_of_trucks" class="form-label">Number of Trucks</label>
                        <input type="number" name="number_of_trucks" class="form-control" id="number_of_trucks" required>
                    </div>
                    <div class="mb-3">
                        <label for="number_of_drivers" class="form-label">Number of Drivers</label>
                        <input type="number" name="number_of_drivers" class="form-control" id="number_of_drivers" required>
                    </div>
                    <div class="mb-3">
                        <label for="amazon_scorecard_rating" class="form-label">Amazon Scorecard Rating</label>
                        <input type="text" name="amazon_scorecard_rating" class="form-control" id="amazon_scorecard_rating" required>
                    </div>
                    <div class="mb-3">
                        <label for="dispatch_handling_method" class="form-label">Dispatch Handling Method</label>
                        <select name="dispatch_handling_method" id="dispatch_handling_method" class="form-control" required>
                            <option value="in house">In House</option>
                            <option value="dispatch service">Dispatch Service</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="main_services" class="form-label">Main Services</label>
                        <textarea name="main_services" class="form-control" id="main_services" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Add AFP Details</button>
                </form>
            </div>
        </div>
    </div>
@endsection
