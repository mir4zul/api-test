<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('supplier_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_booking_id')->constrained('trip_bookings')->onDelete('cascade');
            $table->string('supplier_bill');
            $table->date('supplier_bill_date');
            $table->string('fuel_type');
            $table->decimal('fuel_cost', 10, 2);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier_bills');
    }
};
