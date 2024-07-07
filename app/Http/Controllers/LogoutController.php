<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\ActiveUsers;
use App\Models\Admin\ServicePoint;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
        /**
     * Handle the logout action.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Retrieve the ActiveUser instance for the authenticated user
        $activeUser = ActiveUsers::where('user_id', auth()->user()->id)->first();

        if ($activeUser) {
            // Access the service point ID from the retrieved ActiveUser instance
            $servicePointId = $activeUser->service_point_id;

            // Update service point status based on service_point_id
            ServicePoint::where('id', $servicePointId)
                        ->update(['service_point_status' => false]);

            // Clear entries from user_active_table
            ActiveUsers::where('user_id', auth()->user()->id)->delete();
        }

        // Logout the user
        Auth::logout();

        return redirect()->route('login'); // Redirect to login or any other route
    }
}
