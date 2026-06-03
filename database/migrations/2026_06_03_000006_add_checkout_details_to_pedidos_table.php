<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->string('cliente_nombre')->nullable()->after('detalle');
            $table->string('cliente_email')->nullable()->after('cliente_nombre');
            $table->string('cliente_telefono', 40)->nullable()->after('cliente_email');
            $table->string('envio_direccion')->nullable()->after('cliente_telefono');
            $table->string('envio_ciudad', 120)->nullable()->after('envio_direccion');
            $table->string('envio_provincia', 120)->nullable()->after('envio_ciudad');
            $table->string('envio_codigo_postal', 30)->nullable()->after('envio_provincia');
            $table->string('metodo_pago', 60)->nullable()->after('envio_codigo_postal');
            $table->decimal('precio_unitario', 10, 2)->nullable()->after('metodo_pago');
            $table->decimal('subtotal', 12, 2)->nullable()->after('precio_unitario');
        });
    }

    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropColumn([
                'cliente_nombre',
                'cliente_email',
                'cliente_telefono',
                'envio_direccion',
                'envio_ciudad',
                'envio_provincia',
                'envio_codigo_postal',
                'metodo_pago',
                'precio_unitario',
                'subtotal',
            ]);
        });
    }
};
