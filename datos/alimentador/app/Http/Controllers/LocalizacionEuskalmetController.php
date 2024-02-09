<?php

namespace App\Http\Controllers;

use App\Models\LocalizacionEuskalmet;
use Illuminate\Http\Request;

class LocalizacionEuskalmetController extends Controller
{
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
    public function show(LocalizacionEuskalmet $localizacionEuskalmet)
    {
        //
    }

    public function getByName($name)
    {
        $resultado = LocalizacionEuskalmet::where('nombre', '=', $name)->get();

        return $resultado;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LocalizacionEuskalmet $localizacionEuskalmet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LocalizacionEuskalmet $localizacionEuskalmet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocalizacionEuskalmet $localizacionEuskalmet)
    {
        //
    }
}
