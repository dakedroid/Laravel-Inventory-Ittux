<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloModel extends Model
{
    protected $table='articulo_existencia';
    protected $primaryKey='num_progre';
    public $timestamps=false;
    protected $fillable=[
    'clave',
    'nombre',
    'categoria',
    'tipo',
    'cantidad',
    'unidad',
    'producto'
    ];
    protected $guarded=[

    ];
}
