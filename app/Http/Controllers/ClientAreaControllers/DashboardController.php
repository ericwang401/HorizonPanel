<?php

namespace App\Http\Controllers\ClientAreaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Show all the info 
        return view('client_area.dashboard');
    }
}
