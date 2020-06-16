<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// User yg login
use Auth;
class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        return view('dashboard/dashboard', compact('user'));
    }
}
