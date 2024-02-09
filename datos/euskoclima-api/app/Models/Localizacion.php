<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{
    use HasFactory;

    protected $table = 'localizaciones';
    public $timestamps = false;


    protected $fillable = [
        'nombre',
        'latitud',
        'longitud',
        'cod_el_tiempo',
        'id_zona_el_tiempo',
        'id_localizacion_euskalmet'
    ];


    public function zonaElTiempo()
    {
        return $this->belongsTo(ZonaElTiempo::class);
    }

    public function localizacionEuskalmet()
    {
        return $this->hasOne(LocalizacionEuskalmet::class);
    }

    public function mediciones()
    {
        return $this->hasMany(Medicion::class);
    }
}