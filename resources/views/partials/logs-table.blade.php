<!-- resources/views/dashboard/logs/partials/logs-table.blade.php -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">User</th>
            <th scope="col">Action</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($logs as $log)
            <tr>
                <td>{{ $log->user->name }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->created_at->format('d M Y, H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No logs available.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="text-center">
    <a href="{{ route('notifications.index') }}" class="btn btn-link">View All Notifications</a>
</div>
<!-- Pagination links -->
{{ $logs->links() }}
