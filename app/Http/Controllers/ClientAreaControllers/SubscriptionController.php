<?php

namespace App\Http\Controllers\ClientAreaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Packages;
use App\PackageCategory;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the list of associated subscriptions to an account
        if ( !empty($request->q) )
        {
            // to search the table

            $searchString = $request->q;

            $results = Auth::user()->subscriptions()->whereHas('package', function ($query) use ($searchString){
                $query->where('title', 'like', '%'.$searchString.'%');
            })
            ->with(['package' => function($query) use ($searchString){
                $query->where('title', 'like', '%'.$searchString.'%');
            }])->paginate(config('horizonapp.pagination_length'));

            return view('client_area.subscriptions', ['subscriptions' => $results->appends($request->except('page')), 'q' => $request->q]);
        } else {
            // if no parameter was specified to perform a search
            
            return view('client_area.subscriptions', ['subscriptions' => Auth::user()->subscriptions()->paginate(config('horizonapp.pagination_length'))]);
        }
    }
}
