<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Omnipay\Omnipay;
use \Exception as Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use HorizonPanel\Models\PaymentMethods;
use HorizonPanel\Models\GatewayCredentials as Credentials;

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

    public function edit(PaymentMethods $gateway)
    {
        //dd(Credentials::where('payment_id', $gateway->id)->get();
        return view('admin.gateways.edit', ['gateway' => $gateway, 'parameters' => Credentials::where('payment_id', $gateway->id)->get(), 'defaultParameters' => Omnipay::create($gateway->name)->getDefaultParameters()]);
    }

    public function update(PaymentMethods $gateway, Request $request)
    {
        $defaultParameters = Omnipay::create($gateway->name)->getDefaultParameters();

        $differences = array_map('unserialize', array_diff_key(array_map('serialize', $defaultParameters), array_map('serialize', $request->parameters)));

        if (!empty($differences)) 
        {
            return redirect(route('admin.gateways.edit', $gateway->id))->with(['type' => 'alert-danger', 'info' => __('admin.gateway_integrity_error')]);
        }

        Credentials::where('payment_id', $gateway->id)->delete();

        $credentials = [];

        array_filter(array_map('current', $request->parameters), function ($value, $key) use ($gateway, &$credentials) {
            array_push($credentials, ['payment_id' => $gateway->id, 'name' => $key, 'value' => Crypt::encryptString($value), 'updated_at' => Carbon::now(), 'created_at' => Carbon::now()]);
        }, ARRAY_FILTER_USE_BOTH);
        
        Credentials::insert($credentials);

        return redirect(route('admin.gateways.index'))->with(['type' => 'alert-success', 'info' => __('admin.gateway_credentials_updated')]);
    }

    public function destroy(PaymentMethods $gateway)
    {
        // Delete the gateway
        $gateway->delete();

        return redirect(route('admin.gateways.index'))->with(['type' => 'alert-success', 'info' => __('admin.gateway_deleted')]);
    }

    public function create()
    {
        return view('admin.gateways.create');
    }

    public function store(Request $request)
    {
        // validate the required fields
        $request->validate(['name' => 'required|string|unique:payment_methods']);

        if (!$this->attemptGateway($request->name)) 
        { 
            return redirect(route('admin.gateways.create'))->with(['type' => 'alert-danger', 'info' => __('admin.invalid_gateway')]);
        }

        PaymentMethods::create(['name' => $request->name]); // runs if Omnipay doesn't throw an exception

        return redirect(route('admin.gateways.index'))->with(['type' => 'alert-success', 'info' => __('admin.gateway_added')]);
    }

    public function attemptGateway($gateway) // a gateway exists only if the "try catch" block does not throw an error
    {
        try {
            Omnipay::create($gateway);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}
