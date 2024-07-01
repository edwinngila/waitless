<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\servicesDataTable;
use App\Http\Requests\Admin\CreateservicesRequest;
use App\Http\Requests\Admin\UpdateservicesRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\servicesRepository;
use Illuminate\Http\Request;
use Flash;

class servicesController extends AppBaseController
{
    /** @var servicesRepository $servicesRepository*/
    private $servicesRepository;

    public function __construct(servicesRepository $servicesRepo)
    {
        $this->servicesRepository = $servicesRepo;
    }

    /**
     * Display a listing of the services.
     */
    public function index(servicesDataTable $servicesDataTable)
    {
    return $servicesDataTable->render('admin.services.index');
    }


    /**
     * Show the form for creating a new services.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created services in storage.
     */
    public function store(CreateservicesRequest $request)
    {
        $input = $request->all();

        $services = $this->servicesRepository->create($input);

        Flash::success('Services saved successfully.');

        return redirect(route('admin.services.index'));
    }

    /**
     * Display the specified services.
     */
    public function show($id)
    {
        $services = $this->servicesRepository->find($id);

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('admin.services.index'));
        }

        return view('admin.services.show')->with('services', $services);
    }

    /**
     * Show the form for editing the specified services.
     */
    public function edit($id)
    {
        $services = $this->servicesRepository->find($id);

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('admin.services.index'));
        }

        return view('admin.services.edit')->with('services', $services);
    }

    /**
     * Update the specified services in storage.
     */
    public function update($id, UpdateservicesRequest $request)
    {
        $services = $this->servicesRepository->find($id);

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('admin.services.index'));
        }

        $services = $this->servicesRepository->update($request->all(), $id);

        Flash::success('Services updated successfully.');

        return redirect(route('admin.services.index'));
    }

    /**
     * Remove the specified services from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $services = $this->servicesRepository->find($id);

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('admin.services.index'));
        }

        $this->servicesRepository->delete($id);

        Flash::success('Services deleted successfully.');

        return redirect(route('admin.services.index'));
    }
}
