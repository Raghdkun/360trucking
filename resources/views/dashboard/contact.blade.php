@extends('layouts.dashboard')

@section('title', 'Contact Messages')

@section('content')
    <h1 class="mb-4">Contact Messages</h1>

    <!-- Notification -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Form -->
    <form method="GET" action="{{ route('dashboard.contact') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request()->input('search', '') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Extract Dropdown -->
<!-- Extract Dropdown -->
<div class="mb-4">
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Extract
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('dashboard.contact.export.csv') }}">Extract as CSV</a></li>
            <li><a class="dropdown-item" href="{{ route('dashboard.contact.export.excel') }}">Extract as Excel</a></li>
        </ul>
    </div>
</div>


    <!-- Check if there are any contacts -->
    @if($contacts->isEmpty())
        <p>No contacts available.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Received At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="copyToClipboard('{{ $contact->email }}')">Copy Email</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $contacts->links() }}
        </div>
    @endif

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                showNotification('Email copied to clipboard.');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.classList.add('alert', 'alert-info', 'mt-4');
            notification.textContent = message;

            // Insert notification after the title
            const titleElement = document.querySelector('h1.mb-4');
            titleElement.parentNode.insertBefore(notification, titleElement.nextSibling);

            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
@endsection
