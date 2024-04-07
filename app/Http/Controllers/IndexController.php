<?php

namespace App\Http\Controllers;

use App\Models\personalizar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\paciente;
use App\Models\doctor;
use App\Models\Insumo;
use App\Models\cita;



class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPaciente = paciente::all()->count();
        $totalDoctores = doctor::all()->count();
        $totalInsumos = Insumo::all()->count();
        $totalCitas = cita::all()->count();
        
        $pacientes = DB::table('pacientes')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*)as total'))->groupBy('date')->get();
        
        $citas = DB::table('citas')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*)as total'))->groupBy('date')->get();
        
        //  dd($pacientes[0]->date,  $pacientes[0]->total);
        return view('index',compact('pacientes','totalPaciente','totalDoctores','totalInsumos','totalCitas', 'citas'));
        $personalizar = personalizar::latest()->first();
        return view('index', compact('personalizar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
