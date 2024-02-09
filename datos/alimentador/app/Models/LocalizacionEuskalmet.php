<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalizacionEuskalmet extends Model
{
    use HasFactory;

    protected $table = 'localizaciones_euskalmet';
    public $timestamps = false;


    protected $fillable = [
        'nombre',
        'id_zona_euskalmet',
    ];

    public function localizacion()
    {
        return $this->belongsTo(Localizacion::class);
    }

    public function zona_euskalmet()
    {
        return $this->belongsTo(Zona_euskalmet::class);
    }
}
