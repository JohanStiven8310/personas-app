<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = DB::table('tb_pais')
          ->join('tb_municipio', 'tb_pais.pais_capi', '=', 'tb_municipio.muni_codi')
          ->select('tb_pais.*', 'tb_municipio.muni_nomb')
          ->get();
        return view('pais.index' , ['paises' =>$paises]);

    }
}
