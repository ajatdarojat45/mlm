<?php

namespace App;

use App\SponsorBonus;
use Illuminate\Database\Eloquent\Model;

class SponsorBonus extends Model
{
   protected $fillable = [
      'member_id', 'nominal',
   ];

   public function member()
   {
      return $this->belongsTo(Member::class);
   }

   public function store($sponsor, $pin)
   {
      $sponsorBonus = Bonus::where('id', 1)->first();
      $nominal = $pin->pin->package->value * $sponsorBonus->nominal;
      $this->create([
         'member_id' => $sponsor->id,
         'nominal'   => $nominal,
      ]);
   }
}
