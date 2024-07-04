<?php

namespace App\Http\Controllers\Admin;

use Flash;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Http\Controllers\AppBaseController;
use App\DataTables\Admin\ServicePointDataTable;
use App\Repositories\Admin\ServicePointRepository;
use App\Http\Requests\Admin\CreateService_pointRequest;
use App\Http\Requests\Admin\UpdateService_pointRequest;

class ServicePointController extends AppBaseController
{
    /** @var ServicePointRepository $servicePointRepository*/
    private $servicePointRepository;

    public function __construct(ServicePointRepository $servicePointRepo)
    {
        $this->servicePointRepository = $servicePointRepo;
    }

    /**
     * Display a listing of the Service_point.
     */
    public function index(ServicePointDataTable $servicePointDataTable)
    {
    return $servicePointDataTable->render('admin.service_points.index');
    }


    /**
     * Show the form for creating a new Service_point.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.service_points.create', compact('services'));
    }

    /**
     * Store a newly created Service_point in storage.
     */
    public function store(CreateService_pointRequest $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'service_id' => 'required|max:255',
            'service_point_name' => 'required|unique:service_points,service_point_name',
            // Add other validation rules as needed
        ]);

        $servicePoint = $this->servicePointRepository->create($input);

        Flash::success('Service Point saved successfully.');

        return redirect(route('admin.servicePoints.index'));
    }

    /**
     * Display the specified Service_point.
     */
    public function show($id)
    {
        $servicePoint = $this->servicePointRepository->find($id);

        if (empty($servicePoint)) {
            Flash::error('Service Point not found');

            return redirect(route('admin.servicePoints.index'));
        }

        return view('admin.service_points.show')->with('servicePoint', $servicePoint);
    }

    /**
     * Show the form for editing the specified Service_point.
     */
    public function edit($id)
    {
        $servicePoint = $this->servicePointRepository->find($id);

        if (empty($servicePoint)) {
            Flash::error('Service Point not found');

            return redirect(route('admin.servicePoints.index'));
        }

        return view('admin.service_points.edit')->with('servicePoint', $servicePoint);
    }

    /**
     * Update the specified Service_point in storage.
     */
    public function update($id, UpdateService_pointRequest $request)
    {
        $servicePoint = $this->servicePointRepository->find($id);

        if (empty($servicePoint)) {
            Flash::error('Service Point not found');

            return redirect(route('admin.servicePoints.index'));
        }

        $servicePoint = $this->servicePointRepository->update($request->all(), $id);

        Flash::success('Service Point updated successfully.');

        return redirect(route('admin.servicePoints.index'));
    }

    /**
     * Remove the specified Service_point from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $servicePoint = $this->servicePointRepository->find($id);

        if (empty($servicePoint)) {
            Flash::error('Service Point not found');

            return redirect(route('admin.servicePoints.index'));
        }

        $this->servicePointRepository->delete($id);

        Flash::success('Service Point deleted successfully.');

        return redirect(route('admin.servicePoints.index'));
    }
}
