<?php

namespace App\Http\Controllers\Admin;

use Flash;
use Exception;
use App\Models\User;
use App\Models\settings;
use App\Models\ActiveTicket;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Models\Admin\Tickets;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Admin\ActiveUsers;
use App\Models\Admin\ServicePoint;
use App\Models\Admin\ActiveTickets;
use Illuminate\Support\Facades\Log;
use App\DataTables\Admin\TicketsDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\TicketsRepository;
use App\Http\Controllers\TextToSpeechController;
use App\Http\Controllers\Admin\TicketsController;
use App\Http\Requests\Admin\CreateTicketsRequest;
use App\Http\Requests\Admin\UpdateTicketsRequest;

class TicketsController extends AppBaseController
{
    /** @var TicketsRepository $ticketsRepository*/
    protected $pdf;
    protected $ticketsRepository;

    public function __construct(PDF $pdf, TicketsRepository $ticketsRepo)
    {
        $this->pdf = $pdf;
        $this->ticketsRepository = $ticketsRepo;
    }

    /**
     * Display a listing of the Tickets.
     */
    public function index(TicketsDataTable $ticketsDataTable)
    {
     $ticket =Tickets::pluck('ticket_number')->first();
     return $ticketsDataTable->render('admin.tickets.index', compact('ticket'));
    }


    /**
     * Show the form for creating a new Tickets.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.tickets.create', compact('services'));
    }

    /**
 * Store a newly created Tickets in storage.
 */
    public function store(CreateTicketsRequest $request)
    {


        $input = $request->all();
        
        dd($input);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        // Validate the request data
        $validatedData = $request->validate([
            'ticket_num' => 'nullable|string',
            'service_id' => 'required|integer',
        ]);

        $service = Service::find($validatedData['service_id']);
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

        $digits = str_split((string) $ticket_num);

        // Join array elements with commas
        $formattedNumber = implode(',', $digits);

        // Create a new Ticket
        $Ticket = new Tickets();
        $Ticket->service_id = $validatedData['service_id'];
        $Ticket->ticket_number = $ticket_num;
        $Ticket->save();

        $text = 'Customer ' . $validatedData['customer_name'] . ' with ticket number ' . $formattedNumber. 'is now in service';


        $controller = new TextToSpeechController();
        $respose = $controller->generateSpeech($text);

        $ticketId = $Ticket->id;

        // Find active user for the selected service point
        $randomServicePoint = ServicePoint::where('service_id', $validatedData['service_id'])
                                  ->where('service_point_status', true)
                                  ->inRandomOrder()
                                  ->first();

        $getUserId = ActiveUsers::where('service_point_id',$randomServicePoint->id)->first();
        // dd($getUserId);

        if($getUserId){

            // Create a new ActiveTicket
            $newTicket = new ActiveTickets();
            $newTicket->ticket_id = $ticketId;
            $newTicket->audio_id = $respose;
            $newTicket->user_id = $getUserId->user_id;
            $newTicket->service_point_id = $randomServicePoint->id;
            $newTicket->cancelled =false;
            $newTicket->completed = false;
            $newTicket->save();

            $data = [
                'customer_name' => $validatedData['customer_name'],
                'service_id' => $request->input('service_id'),
                'description' => $request->input('description'),
                'ticket_number' => $ticket_num,  // assuming $ticket_num is generated in your logic
            ];

            $pdf = PDF::loadView('pdf.layout', $data)->setPaper([0, 0, 216, 504], 'portrait')->setOptions(['margin_top' => 5, 'margin_bottom' => 5, 'margin_left' => 5, 'margin_right' => 5]);
            return $pdf->stream('ticket.pdf');

            Flash::success('Tickets saved successfully.');

            return redirect(route('Kiosk.success'));
        }
        else{
            Flash::success('No active teller points.');

            return redirect(route('Kiosk.kioskWithdraw'));

        }


    }

    /**
     * Display the specified Tickets.
     */
    public function show($id)
    {
        $tickets = $this->ticketsRepository->find($id);

        if (empty($tickets)) {
            Flash::error('Tickets not found');

            return redirect(route('admin.tickets.index'));
        }

        return view('admin.tickets.show')->with('tickets', $tickets);
    }

    /**
     * Show the form for editing the specified Tickets.
     */
    public function edit($id)
    {
        $tickets = $this->ticketsRepository->find($id);

        if (empty($tickets)) {
            Flash::error('Tickets not found');

            return redirect(route('admin.tickets.index'));
        }

        return view('admin.tickets.edit')->with('tickets', $tickets);
    }

    /**
     * Update the specified Tickets in storage.
     */
    public function update($id, UpdateTicketsRequest $request)
    {
        $tickets = $this->ticketsRepository->find($id);

        if (empty($tickets)) {
            Flash::error('Tickets not found');

            return redirect(route('admin.tickets.index'));
        }

        $tickets = $this->ticketsRepository->update($request->all(), $id);

        Flash::success('Tickets updated successfully.');

        return redirect(route('admin.tickets.index'));
    }

    /**
     * Remove the specified Tickets from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tickets = $this->ticketsRepository->find($id);

        if (empty($tickets)) {
            Flash::error('Tickets not found');

            return redirect(route('admin.tickets.index'));
        }

        $this->ticketsRepository->delete($id);

        Flash::success('Tickets deleted successfully.');

        return redirect(route('admin.tickets.index'));
    }
}
