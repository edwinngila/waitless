<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
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
        return view('auth.selections',['services' => $services,'services_point' => $services_point,'user'=>$user]);
    }

    public function UpdateUser(Request  $request,$id){

        $user = User::find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('auth.login'));
        }

         // Validate the request
         $validatedData = $request->validate([
            'service' => 'required',
            'services_point' => 'required|unique:users,Service,'.$id,
        ]);
        // Update the user fields
        $user->Service = $validatedData['service'];
        $user->Window = $validatedData['services_point'];

        $user->save();

        return view('home')->with('user', $user);
    }
}
