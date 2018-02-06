<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberPin extends Model
{
   protected $fillable = [
      'member_id', 'pin_id', 'user_id', 'stat', 'type'
   ];

   public function member()
   {
      return $this->belongsTo(Member::class);
   }

   public function member2()
   {
      return $this->hasOne(Member::class, 'memberpin_id', 'id');
   }

   public function pin()
   {
      return $this->belongsTo(Pin::class);
   }
}
