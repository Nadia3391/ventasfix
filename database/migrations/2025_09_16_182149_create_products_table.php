<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('sku')->unique();
        $table->string('nombre');
        $table->string('descripcion_corta', 280);
        $table->text('descripcion_larga')->nullable();
        $table->string('imagen_url');
        $table->unsignedInteger('precio_neto');   // CLP
        $table->unsignedInteger('precio_venta');  // neto * 1.19 (se calcula en el modelo)
        $table->integer('stock_actual')->default(0);
        $table->integer('stock_minimo')->default(0);
        $table->integer('stock_bajo')->default(0);
        $table->integer('stock_alto')->default(0);
        $table->timestamps();
    });
    }

    public function down(): void
    {
    Schema::dropIfExists('products');
    }

};
