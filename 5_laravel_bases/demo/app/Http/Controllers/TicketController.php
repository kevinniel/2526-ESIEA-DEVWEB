<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets.index', [
            "tickets" => Ticket::where('user_id', auth()->id())->get(),
        ]);
    }

    public function create()
    {
        return view('tickets.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Ticket::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
        ]);

        return redirect()->route('tickets.index');
    }

    public function storeApi(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
        ]);

        $ticket = Ticket::create([
            'user_id' => $validated['user_id'],
            'title' => $validated['title'],
        ]);

        $user = User::find($validated['user_id']);

        return response()->json([
            'message' => 'Ticket ajoute avec succes.',
            'ticket' => [
                'id' => $ticket->id,
                'title' => $ticket->title,
                'user_name' => $user->name,
                'show_url' => route('tickets.show', $ticket->id),
                'edit_url' => route('tickets.edit', $ticket->id),
                'destroy_url' => route('tickets.destroy'),
            ],
        ], 201);
    }

    public function show($id)
    {
        $ticket = Ticket::find($id);

        if(auth()->id() != $ticket->user_id) {
            return redirect()->route('tickets.index');
        }

        return view('tickets.show', [
            "ticket" => $ticket,
        ]);
    }

    public function edit($id)
    {
        $ticket = Ticket::find($id);
        
        if(auth()->id() != $ticket->user_id) {
            return redirect()->route('tickets.index');
        }

        return view('tickets.edit', [
            "ticket" => $ticket,
        ]);
    }

    public function update(Request $request, $id)
    {

        $ticket = Ticket::find($id);

        if(auth()->id() != $ticket->user_id) {
            return redirect()->route('tickets.index');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $ticket->update($validated);

        return redirect()->route('tickets.index');
    }

    public function destroy(Request $request)
    {
        $ticket = Ticket::findOrFail($validated['id']);

        if(auth()->id() != $ticket->user_id) {
            return redirect()->route('tickets.index');
        }

        $validated = $request->validate([
            'id' => ['required', 'integer', 'exists:tickets,id'],
        ]);


        $ticket->delete();

        return redirect()->route('tickets.index');
    }
    
    public function contact()
    {
        return view('tickets.contact', [
            "user" => User::with('tickets')->find(auth()->id()),
        ]);
    }
}
