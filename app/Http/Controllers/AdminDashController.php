<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Tickets;
use App\Models\Admin\ActiveTickets;
use Illuminate\Support\Facades\Auth;

class AdminDashController extends Controller
{
    public function getInfo(){
        $user = Auth::user();
        $tickets=Tickets::all();
        $data = User::selectRaw("date_format(created_at, '%Y-%m-%d') as date, count(*) as aggregate")
        ->whereDate('created_at', '>=', now()->subDays(30))
        ->groupBy('date')
        ->get();
        $cancelledTickets = ActiveTickets::where('user_id', $user->id)
            ->where('cancelled', true);

        $completedTickets = ActiveTickets::where('user_id', $user->id)
            ->where('completed', true);
        return view('admin.adminDash', compact('data','tickets','cancelledTickets','completedTickets'));
    }
}
