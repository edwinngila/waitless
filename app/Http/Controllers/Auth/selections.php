<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Models\Admin\ActiveUsers;
use App\Models\Admin\ServicePoint;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Admin\UserRepository;

class selections extends Controller
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function SaveSelection(){
        $services_point = ServicePoint::all();
        return view('auth.selections',['services_point' => $services_point]);
    }

    public function CustomerSelection(){
        $services = Service::all();
        // dd($services,$services_point);
        return view('Kiosk.kiosks',['services' => $services]);
    }

    public function UpdateUser(Request  $request){


        // $user = User::find($id);
         // Validate the request
         $user = Auth::user();

         $validatedData = $request->validate([
            'services_point' => 'required',
        ]);
        // Update the user fields
        $ActiveUsers = new ActiveUsers();
        $ActiveUsers->user_id = $user->id;
        $ActiveUsers->service_point_id = $validatedData['services_point'];
        $ActiveUsers->save();

        $servicePoint = ServicePoint::find($validatedData['services_point']);
        if ($servicePoint) {
            $servicePoint->service_point_status = true;
            $servicePoint->save();
        } else {
            Flash::error('Service point not found.');
            return redirect()->back()->withInput();
        }

        return view('home');
    }
}
