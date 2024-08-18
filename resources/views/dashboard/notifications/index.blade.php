@extends('layouts.dashboard')

@section('title', 'Notifications')

@section('content')
    <div class="container mt-4">
        <h1>All Notifications</h1>
        <div class="list-group">
            @foreach($notifications as $notification)
            <a href="{{ route('notifications.show', $notification->id) }}" class="list-group-item list-group-item-action {{ $notification->is_read ? '' : 'bg-light' }}">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">{{ $notification->title }}</h6>
                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                </div>
                <p class="mb-1">{{ $notification->message }}</p>
            </a>
            @endforeach
        </div>
        <div class="mt-3">
            {{ $notifications->links() }} <!-- Pagination links -->
        </div>
    </div>
@endsection
