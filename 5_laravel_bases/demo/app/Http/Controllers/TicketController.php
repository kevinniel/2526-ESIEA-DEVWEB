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
