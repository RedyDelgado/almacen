<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock_Almacen extends Model
{
    protected $table = "stock__almacen";

    protected $fillable = [
        'almacen_id',
        'producto_id',
        'stock'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public function almacen(){
        return $this->belongsTo(Almacen::class);
    }
}
