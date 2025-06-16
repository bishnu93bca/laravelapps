<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function tickets(){
        $tickets = Ticket::with('user')->latest()->paginate(10);
        $ticket->user->notify(new TicketResponseNotification($ticket));

        return view('admin.tickets', compact('tickets'));
    }
}
