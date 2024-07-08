<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Service;
use App\Models\Admin\ServicePoint;
use App\Models\Admin\ActiveTickets;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    public $table = 'tickets';

    public $fillable = [
        'service_id',
        'customer_name',
        'description',
        'ticket_number'
    ];

    protected $casts = [
        'service_id' => 'integer',
        'customer_name' => 'string',
        'description' => 'string',
        'ticket_number' => 'string',
    ];

    public static array $rules = [
        'service_id' => 'required',
        'customer_name' => 'required',
        'description' => 'required',
        'ticket_number' => 'null'
    ];

    public function activeTickets()
    {
        return $this->hasMany(ActiveTickets::class, 'tickets_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service(){
        return $this->hasMany(Service::class,'service_id');
    }
}
