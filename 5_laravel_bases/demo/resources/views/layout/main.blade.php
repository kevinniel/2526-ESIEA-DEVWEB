<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Index Accueil</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/tickets.css') }}"> --}}
    <script src="{{ asset('js/tickets-modal.js') }}" defer></script>
</head>
<body>
    @include('layout.partials.header')

    {{-- Je prévois l'injection de quelque chose ici (optionnel !) --}}
    @yield('content')
    {{-- <h1>CONTACT</h1> --}}

    <footer>
        © Kévin NIEL wtf design 2026
    </footer>
</body>
</html>
