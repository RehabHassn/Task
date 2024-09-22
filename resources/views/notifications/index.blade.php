@extends('layout')

@section('title','notifications')
@section('content')
    <div class="container">
        <h2>User Notifications</h2>
        <div class="card">
            <div class="card-header">Notifications</div>
            <div class="card-body">
                @if ($notifications->count() > 0)
                    <ul class="list-group">
                        @foreach ($notifications as $notification)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    {{ $notification->data['message'] }}
                                </div>
                                <div>
                                    <a href="{{ route('notifications.read', $notification->id) }}" class="btn btn-primary btn-sm">Mark as Read</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>You have no new notifications.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
