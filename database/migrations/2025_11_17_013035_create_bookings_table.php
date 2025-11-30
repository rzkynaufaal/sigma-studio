<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Relasi
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->unsignedBigInteger('service_id');

            // Detail booking
            $table->date('booking_date');
            $table->time('booking_time');

            // Status
            $table->enum('status', [
                'pending',
                'confirmed',
                'completed',
                'canceled'
            ])->default('pending');

            // Pembayaran
            $table->boolean('is_paid')->default(false);
            $table->decimal('price', 10, 2)->default(0);
            $table->unsignedBigInteger('voucher_id')->nullable();

            // Review
            $table->tinyInteger('rating')->nullable();
            $table->text('review')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->foreign('staff_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('service_id')->references('id')->on('services')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
