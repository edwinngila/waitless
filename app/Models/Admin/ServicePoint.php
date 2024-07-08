<?php

namespace App\Models\Admin;

use App\Models\Admin\Ticket;
use App\Models\Admin\Service;
use App\Models\Admin\Tickets;
use App\Models\Admin\ActiveUsers;
use App\Models\Admin\ActiveTickets;
use Illuminate\Database\Eloquent\Model;

class ServicePoint extends Model
{
    public $table = 'service_points';

    public $fillable = [
        'service_id',
        'service_point_name',
        'service_point_status'
    ];

    protected $casts = [
        'service_id' => 'integer',
        'service_point_name' => 'string',
        'service_point_status'=> 'boolean'
    ];

    public static array $rules = [
        'service_id' => 'required',
        'service_point_name'=>'required'
    ];

    public function activeTicket()
    {
        return $this->hasMany(ActiveTickets::class,'service_point_id','id');
    }

    public function activeUsers()
    {
        return $this->hasMany(ActiveUsers::class,'service_point_id','id');
    }

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
