<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Webpoint\Models\PaymentMethods;
use Omnipay\Omnipay;

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

    public function destroy(PaymentMethods $gateway)
    {
        // Delete the gateway
        $gateway->delete();

        return redirect(route('admin.gateways'))->with(['type' => 'alert-success', 'info' => __('admin.gateway_deleted')]);
    }

    public function create()
    {
        return view('admin.gateways.create');
    }

    public function store(Request $request)
    {
        // validate the required fields
        $request->validate(['name' => 'required|string|unique:payment_methods']);

        if ()
    }
}
