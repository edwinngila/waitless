<?php

namespace App\Models\Admin;

use App\Models\Admin\ServicePoint;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $table = 'services';

    public $fillable = [
        'name',
        'description',
        'status'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'status' => 'string'
    ];

    public static array $rules = [
        'name' =>'required',
        'description' => 'required',
        'status' => 'required'
    ];
    public function tickets()
    {
        return $this->hasOne(ServicePoint::class,'service_id','id');
    }
}
