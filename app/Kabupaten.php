<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    public function provinsi()
    {
    	return $this->belongsTo(Provinsi::class, 'provinsi_id', 'provinsi_id');
    }

    public function kecamatans()
    {
    	return $this->hasMany(Kecamatan::class);
    }
}
