<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('pedidos', 'tipo_entrega')) {
            Schema::table('pedidos', function (Blueprint $table) {
                $table->string('tipo_entrega', 20)->nullable()->after('tipo');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('pedidos', 'tipo_entrega')) {
            Schema::table('pedidos', function (Blueprint $table) {
                $table->dropColumn('tipo_entrega');
            });
        }
    }
};
