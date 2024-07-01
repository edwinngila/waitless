<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    public $table = 'tickets';

    public $fillable = [
        'service',
        'description',
        'ticket_number'
    ];

    protected $casts = [
        'service' => 'string',
        'description' => 'string',
        'ticket_number' => 'string',
    ];

    public static array $rules = [
        'service' => 'required',
        'description' => 'required',
        'ticket_number' => 'null'
    ];


}
