<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    public function kabupatens()
    {
    	return $this->hasMany(Kabupaten::class);
    }
}
