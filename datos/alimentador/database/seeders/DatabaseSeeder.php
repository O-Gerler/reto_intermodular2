<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\LocalizacionController;
use App\Models\Medicion;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $localizacionController = new LocalizacionController();

        $localizacionesJSON = $localizacionController->index();

        $localizaciones = json_decode($localizacionesJSON, true);

        $startDate = Carbon::create(2023, 1, 1, 0, 0, 0);
        $endDate = Carbon::create(2023, 12, 31, 11, 00, 0);

        $currentDate = clone $startDate;

        while ($currentDate <= $endDate) {
            foreach ($localizaciones as $localizacion) {
                $temp = round((mt_rand(-100, 4000) / 100), 2);

                $medicion = new Medicion();
                $medicion->id_localizacion = $localizacion['id'];
                $medicion->fecha = $currentDate->format('Y-m-d');
                $medicion->hora = $currentDate->toTimeString();
                $medicion->temp = $temp;
                $medicion->temp_max = $temp + 7.1;
                $medicion->temp_min = $temp - 8.2;
                $medicion->humedad = mt_rand(0, 99);
                $medicion->viento = round((mt_rand(0, 12000) / 100), 2);
                $medicion->precipitacion = round((mt_rand(0, 4000) / 100), 2);

                // Log::info($medicion);
                $medicion->save();
            }

            $currentDate->addDay(1);
        }

        $startDate = Carbon::create(2024, 1, 1, 0, 0, 0);
        $endDate = Carbon::now();

        $currentDate = clone $startDate;

        while ($currentDate <= $endDate) {
            foreach ($localizaciones as $localizacion) {
                $temp = round((mt_rand(-100, 4000) / 100), 2);

                $medicion = new Medicion();
                $medicion->id_localizacion = $localizacion['id'];
                $medicion->fecha = $currentDate->format('Y-m-d');
                $medicion->hora = $currentDate->toTimeString();
                $medicion->temp = $temp;
                $medicion->temp_max = $temp + 7.1;
                $medicion->temp_min = $temp - 8.2;
                $medicion->humedad = mt_rand(0, 99);
                $medicion->viento = round((mt_rand(0, 12000) / 100), 2);
                $medicion->precipitacion = round((mt_rand(0, 4000) / 100), 2);

                // Log::info($medicion);
                $medicion->save();
            }

            $currentDate->addHour(1);
        }
    }
}
