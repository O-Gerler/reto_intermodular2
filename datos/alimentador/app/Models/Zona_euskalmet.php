<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona_euskalmet extends Model
{
    use HasFactory;

    protected $table = 'zona_euskalmet';
    public $timestamps = false;

    protected $fillable = [
        'cod_zona',
        'cod_region',
    ];

    public function localizaciones()
    {
        return $this->hasMany(LocalizacionEuskalmet::class);
    }
}
