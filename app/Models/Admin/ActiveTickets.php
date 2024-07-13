<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Ticket;
use App\Models\Admin\Service;
use App\Models\Admin\Tickets;
use App\Models\Admin\ServicePoint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActiveTickets extends Model
{
    public $table = 'active_tickes';

    protected $fillable = [
        'tickets_id',
        'user_id',
        'service_point_id',
        'audio_file',
        'cancelled',
        'completed',
    ];

    protected $casts = [
        'tickets_id' =>'integer',
        'user_id'=>'integer',
        'service_point_id' =>'integer',
        'audio_file' =>'string',
        'cancelled' =>'boolean',
        'completed' =>'boolean',
    ];

    public static array $rules = [
        'tickets_id' => 'required|integer',
        'user_id'=>'required|integer',
        'service_point_id' => 'required|integer',
        'audio_file' => 'required',
        'cancelled' => 'required',
        'completed' => 'required',
    ];

    public function ticket()
    {
        return $this->belongsTo(Tickets::class, 'tickets_id');  // Specify foreign key and parent model
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function servicePoint()
    {
        return $this->belongsTo(ServicePoint::class, 'service_point_id');
    }

    public function service()  // Assuming your service table is named 'services'
    {
        return $this->belongsTo(Service::class, 'through', 'ticket'); // Using 'ticket' as the intermediate model
    }
}
