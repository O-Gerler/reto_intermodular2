<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ZonaEuskalmetController;
use App\Models\LocalizacionEuskalmet;
use GuzzleHttp\Client;

class FetchApiDataEuskalmetLocalizaciones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:localizaciones-euskalmet';

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
        $token = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJtZXQwMS5hcGlrZXkiLCJpc3MiOiJJRVMgUExBSUFVTkRJIEJISSBJUlVOIiwiZXhwIjoyMjM4MTMxMDAyLCJ2ZXJzaW9uIjoiMS4wLjAiLCJpYXQiOjE2Mzk3NDc5MDcsImVtYWlsIjoiaWtjZmNAcGxhaWF1bmRpLm5ldCJ9.PwlkDxwtidWSjLo81yRgf6vITaU5yGDH1TgXAVf5Ijl07Bz8auOyQX3uMGiC8GhGiHHymNDBK1IoM3C1aeasdGngQsAMoS9jbiGNGNOhb9JthJnY778zPBxZ6EzlnZEuDFRDGZCRbB4IkyzQk677rP3Nt0v5GPU8g2F4uacpTCWwj0k_fQsCCfhNY89ECGV1pFMwJc_9m7Rezzxd6IMxLyir7MgaWWRGvGb1kH4XqBV_roBBSIO70j4P-p0udoZIuRKWrDZexrSeX9G_brJJplwzoI2eo8mQVX3u3uzn-9E2iystKe0IS3k6uLYiHnNuPQnCkIBUg3JAhu_q9V8iIg';

        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                // Puedes agregar más encabezados según sea necesario
            ],
            // 'query' => [
            //     'param1' => 'valor1',
            //     'param2' => 'valor2',
            //     // Puedes agregar más parámetros de consulta según sea necesario
            // ],
            // Otras opciones...
        ];
        
        $zonaEuskalmetController = new ZonaEuskalmetController();

        $zonasEuskalmet = $zonaEuskalmetController->index();

        $ciudades = ['irun', 'donostia', 'hondarribia', 'oiartzun', 'bilbao', 'gasteiz'];

        foreach($zonasEuskalmet as $zonaEuskalmet) {
            $apiUrl = 'https://api.euskadi.eus/euskalmet/geo/regions/' . $zonaEuskalmet['cod_region'] .'/zones/' . $zonaEuskalmet['cod_zona'] . '/locations';
            
            // Configuración del cliente Guzzle
            $client = new Client();
            
            // Realizar la solicitud y obtener la respuesta
            $response = $client->get($apiUrl, $options);
            
            // Procesar la respuesta como sea necesario
            $data = json_decode($response->getBody(), true);
            
            
            foreach($data as $localizacion) {
                if(!in_array($localizacion['regionZoneLocationId'], $ciudades)) continue;
                $localizacion_euskalmet = new LocalizacionEuskalmet();
                $localizacion_euskalmet->nombre = $localizacion['regionZoneLocationId'];
                $localizacion_euskalmet->id_zona_euskalmet = $zonaEuskalmet['id'];
                $localizacion_euskalmet->save();
            }
        }
    }
}