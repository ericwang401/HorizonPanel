<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackageCategory;

class PackagesController extends Controller
{
    public function index()
    {
        // return the package categories to display

        return view('package_display', ['package_categories' => PackageCategory::all()]);
    }
}
