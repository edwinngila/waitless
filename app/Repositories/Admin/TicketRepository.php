<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Ticket;
use App\Repositories\BaseRepository;

class TicketRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'service_id',
        'description',
        'ticket_number'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Ticket::class;
    }
}
