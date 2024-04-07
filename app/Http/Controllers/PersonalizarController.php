<?php

namespace App\Http\Controllers;

use App\Events\PersonalizarCreated;
use App\Models\personalizar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalizarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalizar = personalizar::latest('created_at')->first();
        return view('Personalizar', compact('personalizar'));
    }

    public function store(Request $request)
    {
        $clinica = new personalizar();
        $clinica->nom_website    = $request->post('nom_website');

        $personalizar = personalizar::latest()->first();
        $logo_prev = $personalizar->logo ?? '';
        $favicon_prev = $personalizar->favicon ?? '';

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->storeAs('imagenes', \Carbon\Carbon::now()->timestamp . '.jpg', 'public');

            if (!empty($logo_prev)) {
                Storage::delete('public/imagenes/' . $logo_prev);
            }

            $path = substr($path, 9);
            $clinica->logo = $path;
        } else {
            $clinica->logo = $logo_prev;
        }

        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->storeAs('imagenes', \Carbon\Carbon::now()->timestamp . '.jpg', 'public');

            if (!empty($favicon_prev)) {
                Storage::delete('public/imagenes/' . $favicon_prev);
            }

            $path = substr($path, 9);
            $clinica->favicon = $path;
        } else {
            $clinica->favicon = $favicon_prev;
        }

        $clinica->save();

        event(new PersonalizarCreated($clinica));

        if ($clinica->save()) {
            return redirect()->route("Personalizar")->with('success', 'Se ha registrado la nueva personalización');
        } else {
            return redirect()->route("Personalizar");
        }
    }
}
