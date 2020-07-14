<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentMethods;

class GatewayCredentialsController extends Controller
{
    public function index(Request $request)
    {
        // Return all available payment methods
        if ( !empty($request->q) ) // if user specifies a query to search through the model
        {
            // to search the table

            return view('admin.gateways.index', ['gateways' => PaymentMethods::where('name', 'LIKE', "%{$request->q}%")->paginate(config('horizonapp.pagination_length')), 'q' => $request->q]);
        }
        
        return view('admin.gateways.index', ['gateways' => PaymentMethods::paginate(config('horizonapp.pagination_length'))]);
    }
}
