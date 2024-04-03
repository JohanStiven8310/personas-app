<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$departamentos = Departamento::all();
        $departamentos = DB::table('tb_departamento')
           ->join('tb_pais', 'tb_departamento.pais_codi', '=' , 'tb_pais.pais_codi')
           ->select('tb_departamento.*' , "tb_pais.pais_nomb")
           ->get();
        
        return view('departamento.index', ['departamentos' => $departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = DB::table('tb_pais')
            ->orderBy('pais_nomb')
            ->get();
        return view('departamento.new', ['paises' => $paises]);
    }

}
