<?php

namespace App\Console\Commands;

use App\Http\Controllers\LocalizacionEuskalmetController;
use App\Http\Controllers\ZonaElTiempoController;
use App\Models\Localizacion;
use App\Models\LocalizacionEuskalmet;
use App\Models\Zona_el_tiempo;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class FetchApiDataEltiempoLocalizaciones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:localizaciones-eltiempo';

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
        $zonaElTiempoController = new ZonaElTiempoController();
        $localizacionEuskalmetController = new LocalizacionEuskalmetController();

        $zonasElTiempo = $zonaElTiempoController->index();

        $zonasSeleccionadas = ['Araba/Álava', 'Bizkaia', 'Gipuzkoa'];
        $ciudadesSeleccionadas = [
            'Vitoria-Gasteiz' => 'gasteiz', 
            'Irun' => 'irun', 
            'Hondarribia' => 'hondarribia', 
            'Oiartzun' => 'oiartzun', 
            'Donostia/San Sebastián' => 'donostia', 
            'Bilbao' => 'bilbao'];

        foreach($zonasElTiempo as $zonaElTiempo) {
            if(!in_array($zonaElTiempo['nombre'], $zonasSeleccionadas)) continue;

            $codigoProvinciaJSON = $zonaElTiempoController->getByName($zonaElTiempo['nombre']);

            $codigoProvincia = json_decode($codigoProvinciaJSON, true);

            Log::info($codigoProvincia[0]['cod_zona']);

            $apiUrl = 'https://www.el-tiempo.net/api/json/v2/provincias/' .$codigoProvincia[0]['cod_zona'] . '/municipios';

            $client = new Client();

            // Realizar la solicitud y obtener la respuesta
            $response = $client->get($apiUrl);

            // Procesar la respuesta como sea necesario
            $data = json_decode($response->getBody(), true);

            $municipios = $data['municipios'];

            foreach($municipios as $municipio) {
                if (!in_array($municipio['NOMBRE'], array_keys($ciudadesSeleccionadas))) continue;
                $localizacion = new Localizacion();
                $localizacion->nombre = $ciudadesSeleccionadas[$municipio['NOMBRE']];
                $localizacion->latitud = $municipio['LATITUD_ETRS89_REGCAN95'];
                $localizacion->longitud = $municipio['LONGITUD_ETRS89_REGCAN95'];
                $localizacion->cod_el_tiempo = substr($municipio['CODIGOINE'], 0, 5);

                $zonaElTiempoJSON = $zonaElTiempoController->getByName($municipio['NOMBRE_PROVINCIA']);
                $zonaElTiempoMunicipio = json_decode($zonaElTiempoJSON, true);
                $localizacion->id_zona_el_tiempo = $zonaElTiempoMunicipio[0]['id'];

                $localizacionEuskalmetJSON = $localizacionEuskalmetController->getByName($ciudadesSeleccionadas[$municipio['NOMBRE']]);
                $localizacionEuskalmetMunicipio = json_decode($localizacionEuskalmetJSON, true);
                $localizacion->id_localizacion_euskalmet = $localizacionEuskalmetMunicipio[0]['id'];

                $localizacion->save();
            }
        }
    }
}
