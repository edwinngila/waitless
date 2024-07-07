<?php

use App\Services\TicketingService;

class TicketController extends Controller
{
    protected $ticketingService;

    public function __construct(TicketingService $ticketingService)
    {
        $this->ticketingService = $ticketingService;
    }

    public function generateTicket(Request $request)
    {
        $servicePointId = $request->input('service_point_id');
        $ticket = $this->ticketingService->generateTicket($servicePointId);

        if ($ticket) {
            return response()->json(['ticket' => $ticket]);
        } else {
            return response()->json(['error' => 'Failed to generate ticket'], 500);
        }
    }

    public function callNextTicket(Request $request)
    {
        $servicePointId = $request->input('service_point_id');
        $ticket = $this->ticketingService->callNextTicket($servicePointId);

        if ($ticket) {
            return response()->json(['ticket' => $ticket]);
        } else {
            return response()->json(['message' => 'No more tickets in queue'], 404);
        }
    }

    public function cancelTicket(Request $request, $ticketId)
    {
        $cancelledTicket = $this->ticketingService->cancelTicket($ticketId);

        if ($cancelledTicket) {
            return response()->json(['cancelled_ticket' => $cancelledTicket]);
        } else {
            return response()->json(['message' => 'Ticket not found or already cancelled'], 404);
        }
    }
}
