<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TicketsDataTable;
use App\Http\Requests\Admin\CreateTicketsRequest;
use App\Http\Requests\Admin\UpdateTicketsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\TicketsRepository;
use App\Models\Admin\Service;
use App\Models\Admin\Tickets;
use Illuminate\Http\Request;
use Flash;

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
        $validatedData = $request->validate([
            'ticket_num' => 'nullable|string',
            'service' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $serviceName =  $validatedData['service'];
        $string =rand(100, 999);
        $firstTwoChars = substr($serviceName,0, 2);
        $ticket_num =$firstTwoChars."-".$string;
        // Create a new service
        $Ticket = new Tickets();
        $Ticket->service = $validatedData['service'];
        $Ticket->description = $validatedData['description'];
        $Ticket->ticket_number =$ticket_num;
        $Ticket->save();
        // $tickets = $this->ticketsRepository->create($input);

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
