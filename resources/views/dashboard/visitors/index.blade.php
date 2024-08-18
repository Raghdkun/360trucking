@extends('layouts.dashboard')

@section('title', 'Visitors')

@section('content')
    <div class="container mt-4">
        <h1>All Visitors</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Referrer</th>
                    <th>Visit Link</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Datetime</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visitors as $visitor)
                <tr>
                    <td>{{ $visitor->referrer }}</td>
                    <td>{{ $visitor->url }}</td>
                    <td>{{ $visitor->country }}</td>
                    <td>{{ $visitor->city }}</td>
                    <td>{{ $visitor->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            <a href="{{ route('visitors.index') }}" class="btn btn-link">View All Visitors</a>
        </div>
        {{ $visitors->links() }}
    </div>
@endsection
