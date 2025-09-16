<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
    Schema::table('users', function (Blueprint $table) {
        $table->string('rut')->unique()->nullable()->after('id');
        $table->string('nombre')->nullable()->after('rut');
        $table->string('apellido')->nullable()->after('nombre');
    });
    }

    public function down(): void
    {   
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['rut','nombre','apellido']);
    });
    }

};
