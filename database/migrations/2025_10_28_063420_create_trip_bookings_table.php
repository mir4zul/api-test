<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trip_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('challan_bill');
            $table->date('load_date');
            $table->date('unload_date');
            $table->json('load_type')->nullable();
            $table->json('unload_type')->nullable();
            $table->string('about_good')->nullable();
            $table->string('quantity')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('vehicle_select')->nullable();
            $table->string('driver_select')->nullable();
            $table->string('helper_select')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_size')->nullable();
            $table->string('duty')->nullable();
            $table->string('client_name')->nullable();
            $table->string('department')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_bookings');
    }
};
