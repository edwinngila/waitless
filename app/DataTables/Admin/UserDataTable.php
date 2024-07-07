<?php

namespace App\DataTables\Admin;

use App\Models\Admin\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\DB; // Import DB facade for raw queries

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'admin.users.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()
            ->select('users.*', 'active_users.service_id', 'active_users.service_point_id') // Select required fields including service_point_id
            ->leftJoin('active_users', 'users.id', '=', 'active_users.user_id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
            'email',
            [
                'data' => 'service_id',
                'name' => 'service.name',
                'title' => 'Service Name',
                'render' => function ($data) {
                    return isset($data->service_id) && isset($data->service->name) ? $data->service->name : '';
                },
            ],
            [
                'data' => 'service_point_id',
                'name' => 'service_points.service_point_name', // Assuming 'service_points' is the relationship
                'title' => 'Service Point',
                'render' => function ($data) {
                    return isset($data->service_point_id) && isset($data->service_points->service_point_name) ? $data->service_points->service_point_name : '';
                },
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'users_datatable_' . time();
    }
}
