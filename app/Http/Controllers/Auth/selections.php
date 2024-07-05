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
        $user = Auth::user();
        $services = Service::all();
        $services_point = ServicePoint::all();
        return view('auth.kiosk',['services' => $services,'services_point' => $services_point,'user'=>$user]);
    }

    public function UpdateUser(Request  $request,$id){

        // $user = User::find($id);

         // Validate the request
         $validatedData = $request->validate([
            'service' => 'required',
            'services_point' => 'required|unique:active_users,service_point_id,'.$id,
        ]);
        // Update the user fields
        $ActiveUsers = new ActiveUsers();
        $ActiveUsers->user_id = $id;
        $ActiveUsers->service_id = $validatedData['service'];
        $ActiveUsers->service_point_id = $validatedData['services_point'];

        $ActiveUsers->save();

        return view('home');
    }
}
