@extends('layout')
@section('title','tickets')
@section('content')
    <div class="container">
        <h2>Submit a Ticket</h2>

        <form action="{{ route('tickets.store') }}" method='post'>
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="request">Request</option>
                    <option value="problem">Problem</option>
                </select>
            </div>

            <div class="form-group">
                <label for="info">Info</label>
                <textarea class="form-control" id="info" name="info" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
