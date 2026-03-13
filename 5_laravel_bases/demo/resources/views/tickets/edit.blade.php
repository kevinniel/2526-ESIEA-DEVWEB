@extends('layout.main')

@section('content')
<h1>TICKETS CREATE</h1>

<form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <input type="text" name="title" value="{{ $ticket->title }}">
    <button type="submit">Envoyer</button>
</form>

@endsection