<!-- resources/views/dashboard/logs/index.blade.php -->
@extends('layouts.dashboard')

@section('title', 'User Logs')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded p-4">
            <h5 class="mb-4">User Activity Logs</h5>
            @include('dashboard.logs.partials.logs-table')
        </div>
    </div>
</div>
@endsection
