<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonaElTiempo extends Model
{
    use HasFactory;
    
    protected $table = 'zona_el_tiempo';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'cod_zona'
    ];

    public function localizaciones()
    {
        return $this->hasMany(Localizacion::class);
    }
}
