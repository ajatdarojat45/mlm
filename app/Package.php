<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
   public function pins()
   {
      return $this->hasMany(Pin::class);
   }
}
