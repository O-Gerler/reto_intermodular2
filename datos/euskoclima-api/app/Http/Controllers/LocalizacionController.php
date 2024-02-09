<?php

namespace App\Http\Controllers;

use App\Models\Localizacion;
use Illuminate\Http\Request;

class LocalizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localizaciones = Localizacion::all();
        $zonaEltiempoController = new ZonaElTiempoController();
        $localizacionEuskalmetController = new LocalizacionEuskalmetController();

        foreach($localizaciones as $localizacion) {
            $localizacion->id_zona_el_tiempo = $zonaEltiempoController->getById($localizacion->id_zona_el_tiempo);
            $localizacion->id_localizacion_euskalmet = $localizacionEuskalmetController->getById($localizacion->id_localizacion_euskalmet);
        }

        return response()->json([
            'message' => 'okey',
            'localizaciones' => $localizaciones
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Localizacion $localizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Localizacion $localizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Localizacion $localizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Localizacion $localizacion)
    {
        //
    }
}
