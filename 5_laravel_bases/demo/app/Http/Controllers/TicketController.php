<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets.index');
    }
    
    public function contact()
    {
        return view('tickets.contact');
    }
}
