<!-- resources/views/tickets/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Support Tickets</h4>
                </div>
                <div class="card-body">
                    @if($tickets->isEmpty())
                        <div class="alert alert-info">No tickets found</div>
                    @else
                        <!-- Table view for larger screens -->
                        <div class="d-none d-lg-block">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tickets as $ticket)
                                    <tr>
                                        <td>#{{ $ticket->id }}</td>
                                        <td>{{ $ticket->title }}</td>
                                        <td>
                                            <span class="badge 
                                                {{ $ticket->status === 'open' ? 'bg-success' : 
                                                   ($ticket->status === 'pending' ? 'bg-warning' : 'bg-secondary') }}">
                                                {{ ucfirst($ticket->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge 
                                                {{ $ticket->priority === 'high' ? 'bg-danger' : 
                                                   ($ticket->priority === 'medium' ? 'bg-warning' : 'bg-success') }}">
                                                {{ ucfirst($ticket->priority) }}
                                            </span>
                                        </td>
                                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-sm btn-outline-primary">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $tickets->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection