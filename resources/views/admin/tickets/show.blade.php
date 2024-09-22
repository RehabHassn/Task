@extends('layout')

@section('content')
    <div class="container">
        <h2>Ticket: {{ $ticket->title }}</h2>

        <p><strong>Type:</strong> {{ $ticket->type }}</p>
        <p><strong>Info:</strong> {{ $ticket->info }}</p>

        <h4>Comments:</h4>
        <ul class="list-group mb-4">
            @foreach($ticket->comments as $comment)
                <li class="list-group-item">
                    <strong>{{ $comment->user->name }}:</strong>
                    <p>{{ $comment->body }}</p>
                    <p>{{ $comment->created_at->format('d M Y, h:i A') }}</p>
                </li>
            @endforeach
        </ul>

        <h4>Add a Reply:</h4>
        <form action="{{ route('admin.tickets.reply', $ticket->id) }}" method='post'>
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="body" rows="4" placeholder="Enter your reply" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit Reply</button>
        </form>
    </div>
@endsection
