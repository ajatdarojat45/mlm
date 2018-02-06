<?php

namespace App;

use App\Bonus;
use Illuminate\Database\Eloquent\Model;

class DailyBonus extends Model
{
   protected $fillable = [
      'member_id', 'pasangan_bonus', 'sponsor_bonus', 'total_bonus'
   ];

   public function member()
   {
      return $this->belongsTo(Member::class);
   }

   public function store($sponsor, $pin)
   {
      // check data
      $dailyBonus = $this->where('member_id', $sponsor->id)->first();
      // claculate sponsor bonus
      $sponsorBonus = Bonus::where('id', 1)->first();
      $nominal = $pin->pin->package->value * $sponsorBonus->nominal;

      if (!empty($dailyBonus)) {
         // update data
         $dailyBonus->update([
            'sponsor_bonus'   => $dailyBonus->sponsor_bonus + $nominal,
            'total_bonus'     => $dailyBonus->total_bonus   + $nominal,
         ]);
      }else {
         // store to db
         $dailyBonus = $this->create([
            'member_id' => $sponsor->id,
         ]);
         // update data
         $dailyBonus->update([
            'sponsor_bonus'   => $dailyBonus->sponsor_bonus + $nominal,
            'total_bonus'     => $dailyBonus->total_bonus   + $nominal,
         ]);
      }
   }
}
