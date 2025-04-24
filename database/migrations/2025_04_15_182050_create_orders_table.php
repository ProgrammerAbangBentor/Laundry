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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relasi ke users
            $table->foreignId('harga_laundry_id')->constrained('harga_laundry')->onDelete('cascade'); // relasi ke harga laundry
            $table->string('no_transaksi')->unique();
            $table->float('berat_pakaian');
            $table->enum('status_pembayaran', ['Cash', 'Transfer'])->default('Cash');
            $table->float('harga');
            $table->integer('lama');
            $table->float('diskon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
