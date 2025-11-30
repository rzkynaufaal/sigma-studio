<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->timestamp('started_at')->nullable()->after('status');
            $table->timestamp('finished_at')->nullable()->after('started_at');

            $table->json('checklist')->nullable()->after('finished_at');
            $table->integer('extra_price')->nullable()->after('checklist');
            $table->text('note')->nullable()->after('extra_price');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['started_at', 'finished_at', 'checklist', 'extra_price', 'note']);
        });
    }
};
