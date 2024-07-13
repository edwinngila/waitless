<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Models\Admin\Tickets;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Admin\ActiveUsers;
use App\Models\Admin\ServicePoint;
use App\Models\Admin\ActiveTickets;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TextToSpeechController;

class SaveTicket extends Controller
{
    //
    public function store(request $request)
    {
        // $input = $request->all();
        // dd($input);


        // Validate the request data
        $validatedData = $request->validate([
            'id' => 'required',
            'serviceName' => 'required',
        ]);
        // dd($validatedData);

        // Generate ticket number
        $service = Service::find($validatedData['id']);
        if (!$service) {
            Flash::error('Service not found.');
            return redirect()->back()->withInput();
        }

        $serviceName = $service->name;
        $string = rand(100, 999);
        $firstTwoChars = strtoupper(substr($serviceName, 0, 2));
        $ticket_num = $firstTwoChars . "-" . $string;

        // Check if the ticket already exists
        if (Tickets::where('ticket_number', $ticket_num)->exists()) {
            Flash::error('Ticket with this number already exists.');
            return redirect()->back()->withInput();
        }

        // Create a new Ticket
        $ticket = new Tickets();
        $ticket->service_id = $validatedData['id'];
        $ticket->ticket_number = $ticket_num;
        $ticket->save();

        $text = 'ticket number ' . $ticket_num. 'is now in service';

        $controller = new TextToSpeechController();
        $response = $controller->generateSpeech($text);

        // Find active user for the selected service point
        $randomServicePoint = ServicePoint::where('service_id', $validatedData['id'])
                                        ->where('service_point_status', true)
                                        ->inRandomOrder()
                                        ->first();

        $getUserId = ActiveUsers::where('service_point_id', $randomServicePoint->id)->first();


        if ($getUserId) {
            // Check if this ticket already exists in active tickets
            if (ActiveTickets::where('ticket_id', $ticket->id)->exists()) {
                Flash::error('This ticket is already active.');
                return redirect()->back()->withInput();
            }

            // Create a new ActiveTicket
            $newTicket = new ActiveTickets();
            $newTicket->ticket_id = $ticket->id;
            $newTicket->audio_file = $response;
            $newTicket->user_id = $getUserId->user_id;
            $newTicket->service_point_id = $randomServicePoint->id;
            $newTicket->cancelled =false;
            $newTicket->completed = false;
            $newTicket->save();

            $data = [
                'service_id' => $request->input('service_id'),
                'ticket_number' => $ticket_num,
                'new_ticket' => $newTicket, // Add the saved ticket data to the array
            ];

            try {
                $pdf = PDF::loadView('pdf.layout', $data)
                    ->setPaper([0, 0, 216, 504], 'portrait')
                    ->setOptions(['margin_top' => 5, 'margin_bottom' => 5, 'margin_left' => 5, 'margin_right' => 5]);

                return $pdf->stream('ticket.pdf');
            } catch (Exception $e) {
                return back()->withErrors(['message' => 'Error generating PDF: ' . $e->getMessage()]);
            }

            Flash::success('Tickets saved successfully.');
            return redirect(route('Kiosk.success'));
        } else {
            Flash::error('No active teller points.');
            return redirect(route('Kiosk.kioskWithdraw'));
        }
    }
}
