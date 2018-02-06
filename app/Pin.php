<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
   // mass assigment
   protected $fillable = [
      'name', 'package_id', 'user_id',
   ];
   // nested
   protected $with = ['package'];
   // relation with package table
   public function package()
   {
      return $this->belongsTo(Package::class);
   }
   // relation with user table
   public function user()
   {
      return $this->belongsTo(User::class);
   }
   // relation with member pin table
   public function memberPin()
   {
      return $this->hasOne(MemberPin::class);
   }
}
