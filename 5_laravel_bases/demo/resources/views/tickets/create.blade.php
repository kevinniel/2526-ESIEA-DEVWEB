@extends('layout.main')

@section('content')
<h1>TICKETS CREATE</h1>

<form action="{{ route('tickets.store') }}" method="POST">
    @csrf
    <input type="text" name="title">
    <button type="submit">Envoyer</button>
</form>

@endsection