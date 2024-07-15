<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'users';

    public $fillable = [
        'name',
        'email',
        'profile_img',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'profile_img' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'profile_img' => 'nullable',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:255',
        'service'=>'nullable',
        'window'=>'nullable',
        'role'=>'nullable',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
