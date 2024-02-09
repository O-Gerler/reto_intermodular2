<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    use HasFactory;

    protected $table = 'mediciones';
    public $timestamps = false;

    protected $fillable = [
        'id_localizacion',
        'fecha',
        'hora',
        'temp',
        'temp_max',
        'temp_min',
        'humedad',
        'viento',
        'precipitacion'
    ];

    public function localizacion() 
    {
        return $this->belongsTo(Localizacion::class);
    }
}
