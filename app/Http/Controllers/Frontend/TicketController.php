<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketResponse;
use Illuminate\Support\Facades\Auth;


class TicketController extends Controller
{

    /**
     * Apply middleware in the constructor
     */
    public function __construct()
    {
        // Apply to all methods

      //$this->middleware('auth');
    }
    
   

    public function index(){
        $tickets = auth()->user()->tickets()
            ->withCount('responses')
            ->latest()
            ->paginate(10); // 10 items per page
        
        return view('tickets.index', compact('tickets'));
    }


    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
        ]);

        $ticket = Auth::user()->tickets()->create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => 'open',
        ]);

        return redirect()->route('tickets.show', $ticket)->with('success', 'Ticket created successfully!');
    }

    
     public function show($id){
        // Example of authorization
        $ticket = Ticket::findOrFail($id);
        $this->authorize('view', $ticket);

        return view('tickets.show', compact('ticket'));
    }


    // public function respond(Request $request,  $id)
    // {
    //     $this->authorize('respond', $ticket);

    //     $request->validate([
    //         'response' => 'required|string',
    //     ]);

    //     $ticket->responses()->create([
    //         'user_id' => Auth::id(),
    //         'response' => $request->response,
    //     ]);

    //     // Update ticket status if admin responded
    //     if (Auth::user()->is_admin) {
    //         $ticket->update(['status' => 'pending']);
    //     }

    //     return back()->with('success', 'Response submitted!');
    // }

    public function respond(Request $request, $id){


        
    $ticket = Ticket::findOrFail($id);
   
    // Verify user can respond to this ticket
    $this->authorize('respond', $ticket);

    // Validate the response content
    $validated = $request->validate([
        'response' => 'required|string|min:10|max:2000',
        'attachments.*' => 'nullable|file|max:2048|mimes:jpg,png,pdf,doc,docx',
    ]);

    // Create the response
    $response = $ticket->responses()->create([
        'user_id' => Auth::id(),
        'response' => $validated['response'],
    ]);


    // Handle file attachments if present
    if ($request->hasFile('attachments')) {
        foreach ($request->file('attachments') as $file) {
            $path = $file->store('ticket_attachments');
            $response->attachments()->create([
                'filename' => $file->getClientOriginalName(),
                'path' => $path,
                'mime_type' => $file->getClientMimeType(),
                'size' => $file->getSize(),
            ]);
        }
    }

    // Update ticket status and notify user
    if (Auth::user()->is_admin) {
        $ticket->update(['status' => 'pending']);
        
        // Notify ticket owner about admin response
        $ticket->user->notify(new TicketRespondedNotification($ticket, $response, true));
    } else {
        // Notify admin about user response
        $adminUsers = User::where('is_admin', true)->get();
        Notification::send($adminUsers, new TicketRespondedNotification($ticket, $response, false));
    }

    // Update ticket's updated_at timestamp
    $ticket->touch();

    return redirect()
           ->route('tickets.show', $ticket)
           ->with('success', __('Response submitted successfully!'));
}

    public function close($id)
    {
        $ticket = Ticket::findOrFail($id);
        $this->authorize('close', $ticket); // Ensure this matches your policy method

        // Logic to close the ticket
        $ticket->status = 'closed';
        $ticket->save();

        return redirect()->route('tickets.index')->with('status', 'Ticket closed successfully.');
    }
}
