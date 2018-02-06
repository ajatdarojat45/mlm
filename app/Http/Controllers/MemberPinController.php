<?php

namespace App\Http\Controllers;

use Auth;
use App\Pin;
use App\Member;
use App\MemberPin;
use Illuminate\Http\Request;

class MemberPinController extends Controller
{
   public function store(Request $request)
   {
      // validasi
      $this->validate($request, [
         'qty'       => 'required',
         'stat'      => 'required',
         'type'      => 'required',
         'package'   => 'required',
         'member'    => 'required',
      ]);
      // check pin
      $pins = Pin::where('package_id', $request->package)->get();
      if ($pins->count() < $request->qty) {
         return back()->with('failed', 'Sorry, your pin request not available. Please generate again');
      }
      // check member
      $member = Member::where('code', $request->member)->first();
      if (empty($member)) {
         return back()->with('failed', 'Sorry, pin receiver not found. Please try again');
      }
      // store to db
      foreach ($pins as $pin) {
         $memberPin = MemberPin::create([
            'member_id' => $member->id,
            'pin_id'    => $pin->id,
            'stat'      => $request->stat,
            'type'      => $request->type,
            'user_id'   => Auth::user()->id,
         ]);
      }
      // return
      return back()->with('success', 'Pin transfered');
   }
}
