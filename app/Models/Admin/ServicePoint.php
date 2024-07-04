<?php

namespace App\Models\Admin;

use App\Models\Admin\Ticket;
use Illuminate\Database\Eloquent\Model;

class ServicePoint extends Model
{
    public $table = 'service_points';

    public $fillable = [
        'service_name',
        'service_point_name',
        'service_point_status'
    ];

    protected $casts = [
        'service_name' => 'string',
        'service_point_name' => 'string',
        'service_point_status'=> 'boolean'
    ];

    public static array $rules = [
        'service_name' => 'required',
        'service_point_name'=>'required'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
