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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string("kode_transaksi");
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $table->foreignId("pengacara_id")->constrained("pengacara")->onDelete("cascade");
            $table->decimal("nominal", 20);
            $table->string("status_pembayaran")->default("Menunggu Pembayaran");
            $table->string("bukti_bayar")->nullable();
            $table->longText("permasalahan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
