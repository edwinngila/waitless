<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    use HasFactory;

    protected $fillable = [
        'tickets_id',
    ];

    protected $casts = [
        'tickets_id' =>'integer',
    ];

    public static array $rules = [
        'tickets_id' => 'required|integer',
    ];
}
