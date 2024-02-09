<?php

namespace App\Console\Commands;

use App\Models\Zona_el_tiempo;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class FetchApiDataElTiempoProvincias extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:provincias-eltiempo';

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
        $apiUrl = 'https://www.el-tiempo.net/api/json/v2/provincias';

        // Configuración del cliente Guzzle
        $client = new Client();

        // Realizar la solicitud y obtener la respuesta
        $response = $client->get($apiUrl);

        // Procesar la respuesta como sea necesario
        $data = json_decode($response->getBody(), true);

        // Puedes realizar acciones adicionales con los datos obtenidos

        $provincias = $data['provincias'];

        foreach($provincias as $provincia) {
            $zona_el_tiempo = new Zona_el_tiempo();
            $zona_el_tiempo->nombre = $provincia['NOMBRE_PROVINCIA'];
            $zona_el_tiempo->cod_zona = $provincia['CODPROV'];
            $zona_el_tiempo->save();
        }
    }
}
