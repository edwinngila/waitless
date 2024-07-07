<?php

namespace App\Http\Controllers\Admin;

use Flash;
use App\Models\User;
use App\Models\ActiveTicket;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Models\Admin\Tickets;
use App\Models\Admin\ActiveUsers;
use App\Models\Admin\ServicePoint;
use App\Models\Admin\ActiveTickets;
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
    private $ticketsRepository;

    public function __construct(TicketsRepository $ticketsRepo)
    {
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
        // dd($input);

        // Validate the request data
        $validatedData = $request->validate([
            'ticket_num' => 'nullable|string',
            'customer_name'=>'required|string',
            'service_id' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        // Generate ticket number
        $serviceName = $validatedData['service_id'];
        $string = rand(100, 999);

        $firstTwoChars = strtoupper(substr($serviceName, 0, 2));
        $ticket_num = $firstTwoChars . "-" . $string;

        $digits = str_split((string) $ticket_num);

        // Join array elements with commas
        $formattedNumber = implode(',', $digits);

        // Create a new Ticket
        $Ticket = new Tickets();
        $Ticket->service_id = $validatedData['service_id'];
        $Ticket->customer_name = $validatedData['customer_name'];
        $Ticket->description = $validatedData['description'];
        $Ticket->ticket_number = $ticket_num;
        $Ticket->save();

        $text = 'Customer '.$validatedData['customer_name'].'with ticket number '.$formattedNumber;

        $controller = new TextToSpeechController();
        $respose = $controller->generateSpeech($text);

        $ticketId = $Ticket->id;

        // Initialize arrays
        $ShowActiveWindos = [];
        $getServicePoint = ServicePoint::where('service_id', $validatedData['service_id'])
                                              ->where('service_point_status',true)
                                              ->get();

        // Collect active tickets for each service point
        foreach ($getServicePoint as $getServicePoints) {
            $GetActiveTickets = ActiveTickets::where('service_point_id', $getServicePoints->id)->count();

            $outcome = (object) [
                'servicePointId' => $getServicePoints->id,
                'servicePointCount' => $GetActiveTickets
            ];

            $ShowActiveWindos[] = $outcome;
        }

        if (!empty($ShowActiveWindos)) {
            // Extract the servicePointCount values and find the minimum
            $servicePointCounts = array_map(function($item) {
                return $item->servicePointCount;
            }, $ShowActiveWindos);

            $minServicePointCount = min($servicePointCounts);

            // Find the corresponding servicePointId for the minimum servicePointCount
            $minServicePoint = array_filter($ShowActiveWindos, function($item) use ($minServicePointCount) {
                return $item->servicePointCount == $minServicePointCount;
            });

            $minServicePointId = !empty($minServicePoint) ? array_values($minServicePoint)[0]->servicePointId : null;


            // Find active user for the minimum service point
            $ActiveUser = ActiveUsers::where('service_point_id', $minServicePointId)->first();

            // if ($ActiveUser === null) {
            //     Flash::error('You cannot get a ticket because there are no active service points.');
            //     return redirect()->back();
            // }

            // Create a new ActiveTicket
            $newTicket = new ActiveTickets();
            $newTicket->tickets_id = $ticketId;
            $newTicket->audio_id = $respose;
            $newTicket->user_id = $ActiveUser->user_id ?? null;
            $newTicket->service_point_id = $minServicePointId;
            $newTicket->save();
        } else {
            return response()->json([
                'message' => 'The array is empty.',
            ]);
        }

        // This section seems redundant since you already handled saving above
        // if ($GetActiveTickets->isEmpty()) {
        //    // Save the new ticket
        // }

        Flash::success('Tickets saved successfully.');

        return redirect(route('admin.tickets.create'));
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
