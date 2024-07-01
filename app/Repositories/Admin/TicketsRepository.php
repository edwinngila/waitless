<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Tickets;
use App\Repositories\BaseRepository;

class TicketsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'service',
        'description',
        'ticket_number'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Tickets::class;
    }
}
