<?php

namespace App\Repositories\Admin;

use App\Models\Admin\services;
use App\Repositories\BaseRepository;

class servicesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return services::class;
    }
}
