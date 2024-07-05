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
        'description',
        'ticket_number'
    ];

    protected $casts = [
        'service_id' => 'Integer',
        'description' => 'string',
        'ticket_number' => 'string',
    ];

    public static array $rules = [
        'service_id' => 'required',
        'description' => 'required',
        'ticket_number' => 'null'
    ];

    public function activeTickets()
    {
        return $this->hasMany(ActiveTickets::class, 'tickets_id');
    }

    public function servicePoint()
    {
        return $this->belongsTo(ServicePoint::class, 'service_point_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service(){
        return $this->hasMany(Service::class,'service_id');
    }
}
