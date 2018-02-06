<?php

namespace App\Http\Controllers;

use App\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function autoComplete(Request $request) {

        $query 	= 	$request->get('term','');
        $desas 	=	Desa::where('desa','LIKE','%'.$query.'%')->get();
        $data	=	array();

        foreach ($desas as $desa) {
                $data[]=array('value'=>$desa->desa.' | '.$desa->kecamatan->kecamatan.' | '.$desa->kecamatan->kabupaten->kabupaten.' | '.$desa->kecamatan->kabupaten->provinsi->provinsi, 'id'=>$desa->desa_id);
        }

        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }
}
