<?php

namespace App\Http\Controllers\Admin;

use Flash;
use App\Models\Admin\Roles;
use Illuminate\Http\Request;
use App\DataTables\Admin\RolesDataTable;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\RolesRepository;
use App\Http\Requests\Admin\CreateRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;

class RolesController extends AppBaseController
{
    /** @var RolesRepository $rolesRepository*/
    private $rolesRepository;

    public function __construct(RolesRepository $rolesRepo)
    {
        $this->rolesRepository = $rolesRepo;
    }

    /**
     * Display a listing of the Roles.
     */
    public function index(RolesDataTable $rolesDataTable)
    {
    return $rolesDataTable->render('admin.roles.index');
    }


    /**
     * Show the form for creating a new Roles.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created Roles in storage.
     */
    public function store(CreateRolesRequest $request)
    {
        $input = $request->all();
        $request->validate([
            'name'=> [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Roles::create([
            'name'=> $request->name,
            'guard_name' => 'web'
        ]);

        $roles = $this->rolesRepository->create($input);

        Flash::success('Permission saved successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified Roles.
     */
    public function show($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.show')->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified Roles.
     */
    public function edit($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.edit')->with('roles', $roles);
    }

    /**
     * Update the specified Roles in storage.
     */
    public function update($id, UpdateRolesRequest $request)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('admin.roles.index'));
        }

        $roles = $this->rolesRepository->update($request->all(), $id);

        Flash::success('Roles updated successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified Roles from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('admin.roles.index'));
        }

        $this->rolesRepository->delete($id);

        Flash::success('Roles deleted successfully.');

        return redirect(route('admin.roles.index'));
    }
}
