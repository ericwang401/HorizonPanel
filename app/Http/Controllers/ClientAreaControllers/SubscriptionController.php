<?php

namespace App\Http\Controllers\ClientAreaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Packages;
use App\PackageCategory;

class SubscriptionController extends Controller
{
    public function index()
    {
        return PackageCategory::find(Packages::find(Auth::user()->packages()->first())->first()->category_id);
    }
}
