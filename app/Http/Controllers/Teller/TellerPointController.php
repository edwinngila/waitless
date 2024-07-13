<?php

namespace App\Http\Controllers\teller;

use App\Models\AudioFile;
use Illuminate\Http\Request;
use App\Models\Admin\Tickets;
use App\Models\Admin\Transaction;
use App\Models\Admin\ActiveTickets;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\TransactionController;

class TellerPointController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $startTime = now(); // Current time
        $data = [
            'startTime' => $startTime,
            'currentTime' => now(),
        ];

        // Get all active tickets for the user
        $cancelledTickets = ActiveTickets::where('user_id', $user->id)
            ->where('cancelled', true)
            ->count();

        $completedTickets = ActiveTickets::where('user_id', $user->id)
            ->where('completed', true)
            ->count();

        $activeTickets = ActiveTickets::where('user_id', $user->id)
            ->where('cancelled', false)
            ->where('completed', false)
            ->orderBy('created_at', 'asc')
            ->get();

        // Get the ticket names
        $ticketNames = $activeTickets->map(function ($activeTicket) {
            return Tickets::where('id', $activeTicket->ticket_id)->first();
        })->take(4);

        // Get the current ticket
        $currentTicket = $ticketNames->first();

        // Count active tickets
        $activeTicketCount = $activeTickets->count();

        // Pass data to the view
        return view('teller.tellardash', compact('activeTicketCount', 'data', 'ticketNames', 'currentTicket','cancelledTickets','completedTickets'));
    }


        public function completeTicket(Request $request)
        {
            $ticketId = $request->input('ticket_id');
            // Save the completed ticket to the database logic here
            // Remove the active ticket


            $user = Auth::user();
            $newTransactions = new Transaction();
            $newTransactions->user_id =$user->id;
            $newTransactions->service_time =$request->ticket_timer;
            $newTransactions->ticket_id =$ticketId;
            $newTransactions->save();

            ActiveTickets::where('ticket_id', $ticketId)->update(['completed' => true]);

            return redirect()->back();
        }

        public function clearTicket(Request $request)
        {
            $ticketId = $request->input('ticket_id');
            // Remove the active ticket
            ActiveTickets::where('ticket_id', $ticketId)->update(['cancelled' => true]);

            return redirect()->back();
        }

        public function nextTicket()
        {
            $user = Auth::user();

            // Get all active tickets for the user
            $activeTickets = ActiveTickets::where('user_id', $user->id)
                ->where('cancelled', false)
                ->where('completed', false)
                ->orderBy('created_at', 'asc')
                ->get();

            if ($activeTickets->isEmpty()) {
                return redirect()->back()->with('message', 'No more tickets in line.');
            }

            // Get the current first ticket
            $currentTicket = $activeTickets->first();
            // Mark the current ticket as completed
            if ($currentTicket) {
                $currentTicket->update(['completed' => true]);
            }

            // Get the new first ticket after marking the current one as completed
            $nextTicket = $activeTickets->skip(1)->first();
            if ($nextTicket) {
                return redirect()->back()->with('message', 'Moved to next ticket.');
            } else {
                return redirect()->back()->with('message', 'No more tickets in line.');
            }
        }

        public function getTickets(){
            $user = Auth::user();
            $startTime = now(); // Current time
            $data = [
                'startTime' => $startTime,
                'currentTime' => now(),
            ];
            $activeTickets = ActiveTickets::where('user_id', $user->id)
                ->with(['ticket.service' => function ($query) {
                    $query->select('name'); // Select only the 'name' column from the 'services' table
                }])
                ->get();

                $ticketNames = $activeTickets->map(function ($activeTicket) {
                    return Tickets::where('id', $activeTicket->ticket_id)->first();
                })->take(4);

                $allTicketNames = $activeTickets->map(function ($activeTicket) {
                    return Tickets::where('id', $activeTicket->ticket_id)->first();
                });


            $activeTicketCount = ActiveTickets::where('user_id', $user->id)->count();
            $currentTicket = $ticketNames->first();

            return view('teller.customerView', compact('activeTicketCount', 'data', 'ticketNames', 'currentTicket','user','allTicketNames'));
        }
}
