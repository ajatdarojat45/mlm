<?php

namespace App\Http\Controllers;

use App\DailyBonus;
use Illuminate\Http\Request;

class DailyBonusController extends Controller
{
   public function index($stat)
   {
      if ($stat == 'all') {
         $dailyBonuses = DailyBonus::orderBy('created_at', 'desc')->get();
      }elseif ($stat == 'qualified') {
         $dailyBonuses = DailyBonus::where('total_bonus', '>=', 900000)->get();
      }elseif ($stat == 'unqualified') {
         $dailyBonuses = DailyBonus::where('total_bonus', '<', 900000)->get();
      }

      return view('dailyBonuses.index', compact('dailyBonuses', 'stat'));
   }
}
