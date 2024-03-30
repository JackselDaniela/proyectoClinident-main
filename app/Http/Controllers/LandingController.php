<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Landing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function volver($validator)
    {

        return redirect()->route('landing', ['modal' => 'true'])->withErrors($validator)->withInput();
    }

    public function autenticar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required', 'email'
            ],
            'password' => [
                'required', 'string'
            ]
        ]);

        if ($validator->fails()) {
            return $this->volver($validator);
        }
        //-----------------------------------------------------------------------------------
        $credencial = $validator->validated();
        $ingresa = Auth::attempt($credencial);
        if ($ingresa) {
            $request->session()->regenerate();
            return redirect()->route('Index');
        }
        return $this->volver($validator)->withErrors([
            'email' => 'Los Datos ingresados no estan registrados, verifique e intente de nuevo'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cerrarSesion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Landing');
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
