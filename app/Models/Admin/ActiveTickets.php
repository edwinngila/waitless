<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Ticket;
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
    ];

    protected $casts = [
        'tickets_id' => 'string',
        'user_id'=>'string',
        'service_point_id' => 'string',
    ];

    public static array $rules = [
        'tickets_id' => 'required',
        'user_id'=>'required',
        'service_point_id' => 'required',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'tickets_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function servicePoint()
    {
        return $this->belongsTo(ServicePoint::class, 'service_point_id');
    }
}
