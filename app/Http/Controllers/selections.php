<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Service;

class selections extends Controller
{
    private function index(){
        $services = Service::all();
        return;
    }
}
