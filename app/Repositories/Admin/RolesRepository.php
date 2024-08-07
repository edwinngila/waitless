<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Roles;
use App\Repositories\BaseRepository;

class RolesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Roles::class;
    }
}
