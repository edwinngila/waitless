<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $table = 'transactions';

    public $fillable = [
        'user_id',
        'service_time',
        'ticket_id'
    ];

    protected $casts = [
        'user_id' => 'double',
        'service_time' => 'string',
        'ticket_id' => 'double'
    ];

    public static array $rules = [
        'user_id' => 'require',
        'service_time' => 'require',
        'ticket_id' => 'require'
    ];


}
