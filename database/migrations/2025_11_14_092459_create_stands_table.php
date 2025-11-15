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
        Schema::create('stands', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_stand')->unique();
            $table->string('lokasi');
            $table->string('ukuran')->nullable();
            $table->integer('harga')->default(0);
            $table->text('fasilitas')->nullable();
            $table->enum('status', ['available', 'booked', 'occupied', 'maintenance'])
                  ->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stands');
    }
};
