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
        Schema::create('pengacara', function (Blueprint $table) {
            $table->id();
            $table->string("foto");
            $table->foreignId("kategori_hukum_id")->constrained("kategori_hukum")->onDelete("cascade");
            $table->foreignId("kota_id")->constrained("kota")->onDelete("cascade");
            $table->string("nama_lengkap");
            $table->string("email");
            $table->char("nomor_telepon", 20);
            $table->char("harga_termurah", 20)->default(1000000);
            $table->string("nama_instansi");
            $table->string("sertifikat_advokat");
            $table->text("pendidikan_terakhir");
            $table->longText("tentang");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengacara');
    }
};
