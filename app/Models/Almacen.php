<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table ="almacenes";

    protected $fillable = [
        'nombre',
    ];

    public function stock_almacen()
    {
        return $this->hasMany(Stock_Almacen::class);
    }
}
