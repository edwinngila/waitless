<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EditUserProfileController extends Controller
{
    public function getProfile(){
        $user = Auth::user();
        return view('admin.updateProfile', compact('user'));
    }
    public function updateProfile(request $request){
        $input = $request->all();

        // $request->validate([
        //     'upload' => 'mimes:jpg,png|max:2048',
        //     'email'=> 'unique:users,email',
        // ]);

        if(!empty($request->upload)){
            $reWriteImage = str_replace(' ','',$request->upload);
            $imageName = time().'.'.$reWriteImage;
            Storage::disk('public')->put($imageName, $request->upload);
            $image = Storage::url($imageName);

            $user = Auth::user();
            $updateUser = User::find($user->id);
            $updateUser->profile_img =$image;
            $updateUser->save();
        }
        // dd($image);


        $user = Auth::user();

        $updateUser = User::find($user->id);
        $updateUser->name=$request->input('name');
        $updateUser->email=$request->input('email');
        $updateUser->save();

        return redirect()->route('userProfile')->with('success', 'Profile updated successfully!');

        // dd($image);
    }

    public function updatePassword(request $request){
        $input = $request->all();

        $users = Auth::user();
        $user = User::where('email', $users->email)->first();

        $user = auth()->user();

        if (!Hash::check($request->OldPassword, $user->password)) {
            return redirect()->route('userProfile')->with('error', 'Old password is incorrect');
        }

        // Validation rules for the new password
        $validator = Validator::make($request->all(), [
            'NewPassword' => 'required|min:8|different:OldPassword|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('userProfile')->withErrors($validator)->withInput();
        }

        // Update the user's password
        $user->password = bcrypt($request->NewPassword);
        $user->save();

        return redirect()->route('userProfile')->with('success', 'Password updated successfully');
    }

    public function deleteAccount(request $request){
        $input = $request->all();

        // $request->validate([
        //     'upload' => 'mimes:jpg,png|max:2048',
        //     'email'=> 'unique:users,email',
        //     'OldPassword'=> 'required',
        //     'password'=> 'string',
        //                 'min:8',
        //                 'regex:/[a-z]/',
        //                 'regex:/[A-Z]/',
        //                 'regex:/[0-9]/',
        //                 'regex:/[@$!%*#?&]/',
        //                 'confirmed',

        //     'confirmPassword'=> 'required',
        // ]);

        $reWriteImage = str_replace(' ','',$request->upload);

        $imageName = time().'.'.$reWriteImage;

        Storage::disk('public')->put($imageName, $request->upload);

        $image = Storage::url($imageName);

        // dd($image);
    }
}
