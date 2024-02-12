#!/bin/bash
php artisan fetch:zonas-euskalmet
php artisan fetch:provincias-eltiempo
php artisan fetch:localizaciones-euskalmet
php artisan fetch:localizaciones-eltiempo
php artisan db:seed
php artisan schedule:work