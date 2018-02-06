<?php

namespace App\Http\Controllers;

use Auth;
use App\Pin;
use App\Package;
use Illuminate\Http\Request;

class PinController extends Controller
{
   public function index($stat)
   {
      // get data
      if ($stat == 'available') {
         $pins = Pin::doesntHave('memberPin')->orderBy('created_at', 'desc')->get();
      }elseif ($stat == 'sent') {
         $pins = Pin::whereHas('memberPin')->orderBy('created_at', 'desc')->get();
      }
      $packages = Package::all();
      // return
      return view('pins.index', compact('pins', 'packages', 'stat'));
   }

   public function generate(Request $request)
   {
      $this->validate($request, [
         'qty'       => 'required',
         'package'   => 'required',
      ]);

      for ($i=0; $i < $request->qty; $i++) {
         $pin = Pin::create([
            'name'         => 'Pin-'.time(),
            'package_id'   => $request->package,
            'user_id'      => Auth::user()->id,
         ]);
      }

      return back()->with('success', 'Pin generated');
   }
}
