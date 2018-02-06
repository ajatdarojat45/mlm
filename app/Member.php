<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
   // mass assigment
   protected $fillable = [
      'id', 'code', 'name', 'memberpin_id', 'sponsor_id', 'upline_id', 'position',
   ];
   // nested
   protected $with = ['pin'];

   public function pin()
   {
      return $this->belongsTo(Pin::class);
   }

   public function memberPin()
   {
      return $this->belongsTo(MemberPin::class, 'memberpin_id', 'id');
   }

   public function sponsor()
   {
      return $this->belongsTo(Member::class, 'sponsor_id', 'id');
   }

   public function upline()
   {
      return $this->belongsTo(Member::class, 'upline_id', 'id');
   }

   public function dailyBonus()
   {
      return $this->hasOne(DailyBonus::class);
   }

   public function sponsorBonuses()
   {
      return $this->hasMany(SponsorBonus::class);
   }
}
