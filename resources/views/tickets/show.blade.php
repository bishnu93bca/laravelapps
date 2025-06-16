@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Ticket #{{ $ticket->id }}: {{ $ticket->title }}</span>
                    @if($ticket->status !== 'closed')
                        <form action="{{ route('tickets.close', $ticket) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Close Ticket</button>
                        </form>
                    @endif
                </div>

                <div class="card-body">
                    <div class="ticket-meta mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span><strong>Status:</strong> 
                                <span class="badge bg-{{ 
                                    $ticket->status === 'open' ? 'info' : 
                                    ($ticket->status === 'closed' ? 'secondary' : 'primary') 
                                }}">
                                    {{ ucfirst($ticket->status) }}
                                </span>
                            </span>
                            <span><strong>Priority:</strong> 
                                <span class="badge bg-{{ 
                                    $ticket->priority === 'high' ? 'danger' : 
                                    ($ticket->priority === 'medium' ? 'warning' : 'success') 
                                }}">
                                    {{ ucfirst($ticket->priority) }}
                                </span>
                            </span>
                        </div>
                        <p class="text-muted">
                            <small>Created {{ $ticket->created_at->diffForHumans() }} by {{ $ticket->user->name }}</small>
                        </p>
                    </div>

                    <div class="ticket-description mb-4 p-3 bg-light rounded">
                        <h5>Description</h5>
                        <p>{{ $ticket->description }}</p>
                    </div>

                    <div class="ticket-responses">
                        <h5 class="mb-3">Responses</h5>
                        
                        @if($ticket->responses->isEmpty())
                            <div class="alert alert-info">No responses yet</div>
                        @else
                            @foreach($ticket->responses as $response)
                                <div class="card mb-3 {{ $response->user->is_admin ? 'border-primary' : '' }}">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-2">
                                            <strong>{{ $response->user->name }}</strong>
                                            <small class="text-muted">{{ $response->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p>{{ $response->response }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        @if($ticket->status !== 'closed')
                            <form method="POST" action="{{ route('tickets.respond', $ticket) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="response" class="form-label">Your Response</label>
                                <textarea class="form-control" id="response" name="response" rows="5" required></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="attachments" class="form-label">Attachments (optional)</label>
                                <input class="form-control" type="file" id="attachments" name="attachments[]" multiple>
                                <div class="form-text">Max 2MB per file. Allowed: JPG, PNG, PDF, DOC, DOCX</div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit Response</button>
                        </form>
                        @else
                            <div class="alert alert-secondary">This ticket is closed and cannot receive new responses</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection