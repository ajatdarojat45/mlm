<?php

namespace App\Http\Controllers;

use Auth;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
   public function index()
   {
      // get data
      $packages = Package::all();
      // return
      return view('packages.index', compact('packages'));
   }

}
