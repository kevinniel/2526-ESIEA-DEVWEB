@extends('layout.main')

@section('content')
<section class="ticket-page" data-ticket-page data-open-on-load="{{ request()->boolean('create') ? 'true' : 'false' }}">
    <h1>TICKETS</h1>

    <table class="ticket-table" border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>user</th>
                <th>title</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody data-ticket-list>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td class="ticket-actions-cell">
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

    <dialog class="ticket-modal" data-ticket-modal aria-labelledby="ticket-modal-title">
        <div class="ticket-modal-content">
            <div class="ticket-modal-header">
                <h2 id="ticket-modal-title">Ajout rapide d'un ticket</h2>
                <button type="button" class="ticket-icon-button" data-close-ticket-modal aria-label="Fermer">&times;</button>
            </div>

            <form action="{{ route('api.tickets.store') }}" method="POST" class="ticket-form" data-ticket-api-form>
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <label for="ticket-title">Titre</label>
                <input id="ticket-title" type="text" name="title" required maxlength="255">

                <div class="ticket-form-actions">
                    <button type="button" class="ticket-secondary-button" data-close-ticket-modal>Annuler</button>
                    <button type="submit" class="ticket-primary-button" data-ticket-submit-button disabled>Envoyer</button>
                </div>
            </form>
        </div>
    </dialog>
</section>

@endsection
