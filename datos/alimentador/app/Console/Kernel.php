<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('fetch:zonas-euskalmet');
        // $schedule->command('fetch:provincias-eltiempo');
        // $schedule->command('fetch:localizaciones-euskalmet');
        // $schedule->command('fetch:localizaciones-eltiempo');
        // $schedule->call(["App\Http\Controllers\ControladorDatosApi@extraerDatos"])->everyFifteenSeconds();
        // $schedule->command('fetch:mediciones-eltiempo')->everyFifteenMinutes();
        // $lastExecutionTime = Cache::get('last_15_minutes_command_execution', now()->subMinutes(2));

        // // Ejecutar el comando de 15 minutos cada 15 minutos
        // $schedule->command('fetch:mediciones-eltiempo')
        //     ->everyTwoMinutes();

        // // Ejecutar el comando de 15 segundos cada 15 segundos, pero saltar si ha pasado menos de 15 minutos desde la última ejecución del comando de 15 minutos
        // $schedule->call(function () use ($lastExecutionTime) {
        //     if (now()->diffInMinutes($lastExecutionTime) >= 2) {
        //         Artisan::call('fetch:mediciones-fake-eltiempo');
        //     }
        // })->everyFifteenSeconds();

        $schedule->call(function () {
            if (now()->second % 900 === 0) {
                Artisan::call('fetch:mediciones-eltiempo');
            } else {
                Artisan::call('fetch:mediciones-fake-eltiempo');
            }
        })->everyFifteenSeconds();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
