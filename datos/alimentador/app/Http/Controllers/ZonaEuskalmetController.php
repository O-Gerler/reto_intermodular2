<?php

namespace App\Http\Controllers;

use App\Models\Zona_euskalmet;
use Illuminate\Http\Request;

class ZonaEuskalmetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zona_euskalmet = Zona_euskalmet::all();

        return $zona_euskalmet;
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
    public function show(Zona_euskalmet $zona_euskalmet)
    {
        return response()->json([
            'zona_euskalmet' => $zona_euskalmet,
            'status' => true,
        ], 202);
    }

    public function getById($id)
    {
        $resultado = Zona_euskalmet::where('id', '=', $id)->get();

        return $resultado;
    }

    public function getByName($name)
    {
        $resultado = Zona_euskalmet::where('name', '=', $name)->get();

        return $resultado;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zona_euskalmet $zona_euskalmet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zona_euskalmet $zona_euskalmet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zona_euskalmet $zona_euskalmet)
    {
        //
    }
}
