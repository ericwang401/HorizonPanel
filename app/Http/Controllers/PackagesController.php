<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackageCategory;

class PackagesController extends Controller
{
    public function index()
    {
        // return the package categories to display

        return view('store.package_display', ['package_categories' => PackageCategory::all(), 'active_category' => PackageCategory::first()]);
    }
    
    public function show($id)
    {
        $category = PackageCategory::where('slug', '=', $id)->orWhere('id', '=', $id)->firstOrFail();
        
        return view('store.package_display', ['package_categories' => PackageCategory::all(), 'active_category' => $category]);
    }
}
