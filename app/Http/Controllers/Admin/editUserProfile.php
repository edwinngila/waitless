<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class editUserProfile extends Controller
{
    public function getProfile(){
        $user = Auth::user();
        return view('admin.updateProfile', compact('roles'));
    }
    public function updateProfile(){

    }
}
