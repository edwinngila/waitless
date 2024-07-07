<?php

namespace App\Services;

use App\Models\Admin\ServicePoint;
use App\Models\Admin\Ticket;
use Carbon\Carbon;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;

class TicketingService extends AppBaseController
{
    /**
     * Generate a new ticket for the specified service point.
     *
     * @param int $servicePointId
     * @return Ticket|null
     */
    public function generateTicket(int $servicePointId): ?Ticket
    {
        // Find the service point
        $servicePoint = ServicePoint::findOrFail($servicePointId);

        // Get the next ticket number for the service point
        $nextTicketNumber = $this->getNextTicketNumber($servicePointId);

        if ($nextTicketNumber === null) {
            return null;
        }

        // Create a new ticket
        $ticket = new Ticket();
        $ticket->service_point_id = $servicePointId;
        $ticket->ticket_number = $nextTicketNumber;
        $ticket->issued_at = Carbon::now();
        $ticket->valid_until = Carbon::now()->addMinutes(5); // Valid for 5 minutes

        // Save the ticket
        $ticket->save();

        return $ticket;
    }

    /**
     * Get the next available ticket number for the specified service point.
     *
     * @param int $servicePointId
     * @return int|null
     */
    protected function getNextTicketNumber(int $servicePointId): ?int
    {
        // Get the maximum ticket number currently in use
        $maxTicketNumber = Ticket::where('service_point_id', $servicePointId)
            ->max('ticket_number');

        // If no tickets exist, start from 1
        if ($maxTicketNumber === null) {
            return 1;
        }

        // Return the next sequential ticket number
        return $maxTicketNumber + 1;
    }

    /**
     * Call the next ticket in the queue for service at the specified service point.
     *
     * @param int $servicePointId
     * @return Ticket|null
     */
    public function callNextTicket(int $servicePointId): ?Ticket
    {
        // Find the next ticket in the queue for the service point
        $nextTicket = Ticket::where('service_point_id', $servicePointId)
            ->whereNull('served_at')
            ->orderBy('ticket_number')
            ->first();

        if ($nextTicket === null) {
            return null;
        }

        // Update ticket details to mark it as called
        $nextTicket->called_at = Carbon::now();
        $nextTicket->save();

        return $nextTicket;
    }

    /**
     * Cancel a ticket and move to the next one in the queue.
     *
     * @param int $ticketId
     * @return Ticket|null
     */
    public function cancelTicket(int $ticketId): ?Ticket
    {
        // Find the ticket to cancel
        $ticket = Ticket::findOrFail($ticketId);

        // Mark the ticket as cancelled
        $ticket->cancelled_at = Carbon::now();
        $ticket->save();

        // Call the next ticket in the queue
        return $this->callNextTicket($ticket->service_point_id);
    }
}
