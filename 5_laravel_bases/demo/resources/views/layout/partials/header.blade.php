<header>
    <nav>
        <ul>
            <li>
                <a href="{{ route('tickets.index') }}">Tickets</a>
            </li>
            <li>
                <a href="{{ route('tickets.create') }}">Create Ticket</a>
            </li>
            <li>
                @if (request()->routeIs('tickets.index'))
                    <button type="button" class="ticket-primary-button" data-open-ticket-modal>Ajout rapide</button>
                @else
                    <a href="{{ route('tickets.index', ['create' => 1]) }}" class="ticket-primary-button">Ajout rapide</a>
                @endif
            </li>
            <li>
                <a href="{{ route('tickets.contact') }}">Contact</a>
            </li>
        </ul>
    </nav>
</header>
