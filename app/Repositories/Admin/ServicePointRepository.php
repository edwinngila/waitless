<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ServicePoint;
use App\Repositories\BaseRepository;

class ServicePointRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'service_name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ServicePoint::class;
    }
}
