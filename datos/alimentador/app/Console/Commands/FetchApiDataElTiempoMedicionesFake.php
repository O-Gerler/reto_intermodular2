<?php

namespace App\Console\Commands;

use App\Http\Controllers\LocalizacionController;
use App\Http\Controllers\ZonaElTiempoController;
use App\Models\Medicion;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FetchApiDataElTiempoMedicionesFake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:mediciones-fake-eltiempo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $localizacionController = new LocalizacionController();
        $zonaElTiempoController = new ZonaElTiempoController();

        $localizacionesJSON = $localizacionController->index();

        $localizaciones = json_decode($localizacionesJSON, true);

        foreach($localizaciones as $localizacion) {
            $zonaElTiempoJSON = $zonaElTiempoController->getById($localizacion['id_zona_el_tiempo']);

            $zonaElTiempo = json_decode($zonaElTiempoJSON, true);

            $apiUrl = 'https://www.el-tiempo.net/api/json/v2/provincias/' . $zonaElTiempo[0]['cod_zona'] . '/municipios' . '/' . $localizacion['cod_el_tiempo'];

            $client = new Client();

            // Realizar la solicitud y obtener la respuesta
            $response = $client->get($apiUrl);

            // Procesar la respuesta como sea necesario
            $data = json_decode($response->getBody(), true);

            $medicion = new Medicion();
            $medicion->id_localizacion = $localizacion['id'];
            $medicion->fecha = $data['fecha'];
            $horaActual = Carbon::now();
            $medicion->hora = $horaActual->toTimeString();
            $medicion->temp = $data['temperatura_actual'] + (rand(0, 200) - 100) / 100;
            $medicion->temp_max = $data['temperaturas']['max'];
            $medicion->temp_min = $data['temperaturas']['min'];
            $medicion->humedad = $data['humedad'] + rand(0, 200) / 100;
            $medicion->viento = $data['viento'] + rand(0, 200) / 100;
            $medicion->precipitacion = $data['precipitacion'] == 'Ip' 
                ? 0 + rand(0, 200) / 100
                : $data['precipitacion'] + rand(0, 200) / 100;

            $medicion->save();
            // Log::info($medicion);
        }
    }
}
