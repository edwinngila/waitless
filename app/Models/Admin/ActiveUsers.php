<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Service;
use App\Models\Admin\ServicePoint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActiveUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'service_point_id',
    ];

    protected $casts = [
        'service_id' => 'integer',
        'user_id'=>'integer',
        'service_point_id' => 'integer',
    ];

    public static array $rules = [
        'service_id' => 'required',
        'user_id'=>'required',
        'service_point_id' => 'required',
    ];
    public function servicePoint()
    {
        return $this->belongsTo(servicePoint::class, 'service_point_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
