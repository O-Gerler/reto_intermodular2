<?php

namespace App\Http\Controllers;

use App\Models\Zona_el_tiempo;
use Illuminate\Http\Request;

class ZonaElTiempoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zonas_el_timepo = Zona_el_tiempo::all();

        return $zonas_el_timepo;
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
    public function show(Zona_el_tiempo $zona_el_tiempo)
    {
        return response()->json([
            'zona_el_tiempo' => $zona_el_tiempo,
            'status' => true,
        ], 202);
    }

    public function getById($id)
    {
        $resultado = Zona_el_tiempo::where('id', '=', $id)->get();

        return $resultado;
    }

    public function getByName($name)
    {
        $resultado = Zona_el_tiempo::where('nombre', '=', $name)->get();

        return $resultado;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zona_el_tiempo $zona_el_tiempo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zona_el_tiempo $zona_el_tiempo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zona_el_tiempo $zona_el_tiempo)
    {
        //
    }
}
