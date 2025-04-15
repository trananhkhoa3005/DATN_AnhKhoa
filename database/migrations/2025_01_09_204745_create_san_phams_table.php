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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id('MaSP');
            $table->string('TenSP');
            $table->string('HinhAnh');
            $table->unsignedBigInteger('MaLoai');
            $table->unsignedBigInteger('MaHSX');
            $table->string('MoTa')->nullable();
            $table->integer('DonGia')->nullable();
            $table->integer('SLTon')->nullable();
            $table->integer('PTGiamGia')->nullable();
            $table->string('GhiChu')->nullable();
            $table->timestamps();

            $table->foreign('MaLoai')->references('MaLoai')->on('loai_sp')->onDelete('cascade');
            $table->foreign('MaHSX')->references('MaHSX')->on('hang_sx')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
