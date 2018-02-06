<?php

namespace App\Http\Controllers;

use App\Member;
use App\MemberPin;
use App\SponsorBonus;
use App\DailyBonus;
use Illuminate\Http\Request;

class MemberController extends Controller
{
   public function create()
   {
      $memberPins = MemberPin::doesntHave('member2')->get();
      return view('members.create', compact('memberPins'));
   }

   public function index()
   {
      // get data
      $members = Member::orderBy('created_at', 'desc')->get();
      // return
      return view('members.index', compact('members'));
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'memberPin'       => 'required',
         'upline'          => 'required',
         'sponsor'         => 'required',
         // 'username'        => 'required',
         // 'password'        => 'required',
         // 'nik'             => 'required',
         // 'name'            => 'required',
         // 'address'         => 'required',
         // 'desa_id'         => 'required',
         // 'rekening_no'     => 'required | unique:members',
         // 'rekening_name'   => 'required',
      ]);
      // pin check
      $pin = MemberPin::where('id', $request->memberPin)->first();
      if (empty($pin)) {
         return back()->with('failed', 'Sorry your pin not found. Please try again.');
      }
      // upline cek
      $upline = Member::where('code', $request->upline)->first();
      if (empty($upline)) {
         return back()->with('failed', 'Sorry your upline id not found. Please try again.');
      }
      // sponsor check
      $sponsor = Member::where('code', $request->sponsor)->first();
      if (empty($sponsor)) {
         return back()->with('failed', 'Sorry your sponsor id not found. Please try again.');
      }

      $member = Member::create([
         'memberpin_id'    => $request->memberPin,
         'sponsor_id'      => $sponsor->id,
         'upline_id'       => $upline->id,
         'position'        => 'R',
         'code'            => 'FIM-'.time(),
         // 'username'        => $request->username,
         // 'password'        => $request->password,
         // 'nik'             => $request->nik,
         // 'name'            => $request->name,
         // 'address'         => $request->address,
         // 'desa_id'         => $request->desa_id,
         // 'heir'            => $request->heir,
         // 'relation'        => $request->relation,
         // 'rekening_no'     => $request->rekening_no,
         // 'rekening_name'   => $request->rekening_name,
      ]);

      // call daily bonus store
      $dailyBonus = New DailyBonus;
      $dailyBonus->store($sponsor, $pin);
      // call sponsor bonus store
      $sponsorBonus = New SponsorBonus;
      $sponsorBonus->store($sponsor, $pin);

      return back()->with('success', 'Data saved');

   }
}
