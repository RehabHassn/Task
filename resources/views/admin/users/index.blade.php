@extends('layout')

@section('content')
    <div class="container">
        <h2>User Management</h2>

        <form action="{{ route('admin.users.index') }}" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}" class="form-control">
            <button type="submit" class="btn btn-primary mt-2">Search</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-2">Clear</a>
        </form>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#sendNotificationModal-{{ $user->id }}">Send Notification</button>

                        <!----------notification modal ------------->
                        <div class="modal fade" id="sendNotificationModal-{{ $user->id }}" tabindex="-1" aria-labelledby="sendNotificationModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.users.notify', $user->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Send Notification</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="form-control" name="message" placeholder="Enter your message" required></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $users->links() }}

        <a href="{{ route('admin.users.exportPDF') }}" class="btn btn-success">Export as PDF</a>
    </div>
@endsection
