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
        'ticket_number'
    ];

    protected $casts = [
        'service_id' => 'integer',
        'ticket_number' => 'string',
    ];

    public static array $rules = [
        'service_id' => 'required',
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
