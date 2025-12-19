<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';

    protected $fillable = [
        'nombre_cliente',
        'telefono_cliente',
        'servicio',
        'cantidad',
        'estado',
    ];

    public static function getPedidos(){
        return self::select('id','nombre_cliente', 'telefono_cliente', 'servicio', 'cantidad', 'estado', 'created_at')
        ->where('estado', '!=', 'eliminado')->get();
    }
}
