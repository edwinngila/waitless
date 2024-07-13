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
        'service_point_id',
    ];

    protected $casts = [
        'user_id'=>'integer',
        'service_point_id' => 'integer',
    ];

    public static array $rules = [
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
}
