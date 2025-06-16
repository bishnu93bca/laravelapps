<!-- resources/views/components/ticket-status-bar.blade.php -->
<div class="ticket-status-bar card shadow-sm">
    <div class="card-header bg-white border-bottom">
        <h5 class="mb-0">Support Tickets</h5>
    </div>
    <div class="card-body p-0">
        <div class="list-group list-group-flush">
            @foreach($tickets as $ticket)
            <a href="{{ route('tickets.show', $ticket) }}" 
               class="list-group-item list-group-item-action 
                      border-0 py-3 px-4 
                      {{ $ticket->status === 'open' ? 'ticket-open' : 
                         ($ticket->status === 'pending' ? 'ticket-pending' : 'ticket-closed') }}">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">{{ $ticket->title }}</h6>
                        <small class="text-muted">#{{ $ticket->id }}</small>
                    </div>
                    <div class="text-end">
                        <span class="badge 
                            {{ $ticket->priority === 'high' ? 'bg-danger' : 
                               ($ticket->priority === 'medium' ? 'bg-warning' : 'bg-success') }}">
                            {{ ucfirst($ticket->priority) }}
                        </span>
                        <div class="mt-1">
                            <small class="text-muted">{{ $ticket->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <small class="text-muted">
                        <i class="bi bi-person"></i> {{ $ticket->user->name }}
                    </small>
                    <small class="text-muted">
                        <i class="bi bi-chat"></i> {{ $ticket->responses_count }} responses
                    </small>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="card-footer bg-white border-top">
        <a href="{{ route('tickets.create') }}" class="btn btn-primary btn-sm w-100">
            <i class="bi bi-plus-circle"></i> Create New Ticket
        </a>
    </div>
</div>

<style>
    .ticket-status-bar {
        max-height: 600px;
        overflow-y: auto;
    }
    .ticket-open {
        border-left: 4px solid #28a745;
    }
    .ticket-pending {
        border-left: 4px solid #ffc107;
    }
    .ticket-closed {
        border-left: 4px solid #6c757d;
    }
    .ticket-status-bar::-webkit-scrollbar {
        width: 5px;
    }
    .ticket-status-bar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .ticket-status-bar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
</style>