<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('pedidos', 'orden_id')) {
            Schema::table('pedidos', function (Blueprint $table) {
                $table->string('orden_id')->nullable()->index()->after('producto_id');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('pedidos', 'orden_id')) {
            Schema::table('pedidos', function (Blueprint $table) {
                $table->dropColumn('orden_id');
            });
        }
    }
};
