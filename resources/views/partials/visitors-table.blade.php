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
            <td>{{ $visitor->created_at}}</td>
            {{-- ->diffForHumans()  --}}
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
    <a href="{{ route('visitors.index') }}" class="btn btn-link">View All Visitors</a>
</div>
{{ $visitors->links() }}
