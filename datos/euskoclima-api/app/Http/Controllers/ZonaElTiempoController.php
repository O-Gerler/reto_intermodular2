<?php

namespace App\Http\Controllers;

use App\Models\ZonaElTiempo;
use Illuminate\Http\Request;

class ZonaElTiempoController extends Controller
{
    public function getById($id) {
        $resultadoJSON = ZonaElTiempo::where('id', '=', $id)->get();

        $resultado = json_decode($resultadoJSON, true);

        return $resultado[0];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(ZonaElTiempo $zonaElTiempo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ZonaElTiempo $zonaElTiempo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ZonaElTiempo $zonaElTiempo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ZonaElTiempo $zonaElTiempo)
    {
        //
    }
}
