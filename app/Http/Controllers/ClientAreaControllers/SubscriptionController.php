<?php

namespace App\Http\Controllers\ClientAreaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Packages;
use App\PackageCategory;

class SubscriptionController extends Controller
{
    public function index()
    {
        // Fetch the list of associated subscriptions to an account

        return view('client_area.subscriptions', ['subscriptions' => Auth::user()->subscriptions()->get()]);
    }
}
