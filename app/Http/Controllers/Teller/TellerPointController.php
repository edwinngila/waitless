<?php

namespace App\Http\Controllers\teller;

use Illuminate\Http\Request;
use App\Models\Admin\Tickets;
use App\Models\Admin\ActiveTickets;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TellerPointController extends Controller
{
    public function index(){

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
        dd($activeTickets);

        $ticketNames = $activeTickets->map(function ($activeTicket) {
            return $activeTicket->tickets->ticket_number;
        });

        $activeTicket = ActiveTickets::where('user_id', $user->id)->count();

        // $activeTicket = ActiveTickets::where('user_id', $user_id)->count();
        return view('teller.tellardash', compact('activeTicket','data'));
    }
}
