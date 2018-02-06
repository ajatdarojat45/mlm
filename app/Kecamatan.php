<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public function kabupaten()
    {
    	return $this->belongsTo(Kabupaten::class, 'kabupaten_id', 'kabupaten_id');
    }

    public function desas()
    {
    	return $this->hasMany(Desa::class);
    }
}
