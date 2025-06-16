<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ticket;

class TicketPolicy
{
    /**
     * Determine if the given ticket can be viewed by the user.
     */
    public function view(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->user_id;
    }

    /**
     * Determine if the user can update the ticket.
     */
    public function update(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->user_id;
    }

    /**
     * Determine if the user can delete the ticket.
     */
    public function delete(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->user_id;
    }
    public function close(User $user, Ticket $ticket)
    {
        // Example logic: only the ticket owner can close it
        return $user->id === $ticket->user_id;
    }
    public function respond(User $user, Ticket $ticket)
    {
        // Example logic: only the ticket owner can close it
        return $user->id === $ticket->user_id;
    }
}
