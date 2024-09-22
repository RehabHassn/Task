@extends('layout')

@section('content')
    <div class="container">
        <h2>Ticket Management</h2>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>User</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->type }}</td>
                    <td>
                        <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $tickets->links() }}
    </div>
@endsection
