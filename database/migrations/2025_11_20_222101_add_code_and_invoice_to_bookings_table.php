<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Kode unik buat barcode/QR
            $table->string('code')->nullable()->unique();

            // Nomor invoice (akan diisi saat completed)
            $table->string('invoice_number')->nullable()->unique();
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['code', 'invoice_number']);
        });
    }
};

