@extends('layout.main')

@section('content')
<h1>TICKETS</h1>

<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>user</th>
            <th>title</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->user->name }}</td>
                <td>{{ $ticket->title }}</td>
                <td>
                    <a href="{{ route('tickets.show', $ticket->id) }}">voir</a>
                    <a href="{{ route('tickets.edit', $ticket->id) }}">modifier</a>
                    <form action="{{ route('tickets.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $ticket->id }}">
                        <button type="submit">supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection