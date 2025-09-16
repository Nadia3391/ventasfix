<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku','nombre','descripcion_corta','descripcion_larga',
        'imagen_url','precio_neto','precio_venta',
        'stock_actual','stock_minimo','stock_bajo','stock_alto'
    ];

    protected static function booted()
    {
        static::saving(function ($p) {
            $p->precio_venta = (int) round($p->precio_neto * 1.19);
        });
    }

    protected $appends = ['stock_status'];

    public function getStockStatusAttribute(): string
    {
        if ($this->stock_actual <= $this->stock_minimo) return 'crítico';
        if ($this->stock_actual <= $this->stock_bajo)   return 'bajo';
        if ($this->stock_actual >= $this->stock_alto)   return 'alto';
        return 'normal';
    }
}
