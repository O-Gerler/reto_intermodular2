<?php

namespace App\Http\Controllers;

use App\Models\Medicion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MedicionController extends Controller
{
    public function getByIds(Request $request)
    {
        $ciudades = $request['ciudades'];
        $listaDeCiudades = explode(',', $ciudades);

        $ultimosRegistros = Medicion::whereIn('id_localizacion', $listaDeCiudades)
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'desc')
            ->take(count($listaDeCiudades))
            ->get();

        return response()->json([
            'mediciones' => $ultimosRegistros
        ]);
    }

    public function getMedicionesCiudadPorDia(Request $request)
    {
        $fechaHoy = Carbon::now()->toDateString(); // Obtener la fecha actual en formato 'Y-m-d'

        $fechaInicio = $request['fecha']; 
        $idLocalizacion = $request['id'];

        $registrosPorDia = Medicion::where('id_localizacion', $idLocalizacion)
            ->whereBetween('fecha', [$fechaInicio, $fechaHoy])
            ->orderBy('fecha')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->fecha)->format('Y-m-d');
            })
            ->map(function ($group) {
                return $group->first(); 
            });

        return response()->json([
            'registros' => $registrosPorDia
        ]);
    }

    public function getMedicionesCiudadPorHora(Request $request)
    {
        $fechaHoy = Carbon::now()->toDateString();
        $fechaInicio = $request['fecha']; 
        $idLocalizacion = $request['id'];

        $registrosPorHora = Medicion::where('id_localizacion', $idLocalizacion)
            ->whereBetween('fecha', [$fechaInicio, $fechaHoy])
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse("{$date->fecha} {$date->hora}")->format('Y-m-d H:00:00');
            })
            ->map(function ($group) {
                return $group->first(); 
            });

        return response()->json([
            'registros' => $registrosPorHora
        ]);
    }

    public function getMedicionesHoyCiudad(Request $request)
    {
        $fechaHoy = Carbon::now()->toDateString();
        $idLocalizacion = $request['id'];

        $registrosPorHora = Medicion::where('id_localizacion', $idLocalizacion)
            ->where('fecha', $fechaHoy)
            ->orderBy('hora')  
            ->get();

        return response()->json([
            'registros' => $registrosPorHora
        ]);
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
    public function show(Medicion $medicion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicion $medicion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicion $medicion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicion $medicion)
    {
        //
    }
}
