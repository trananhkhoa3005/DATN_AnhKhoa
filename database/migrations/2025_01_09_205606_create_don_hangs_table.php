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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id('MaDH');
            $table->unsignedBigInteger('MaND');
            $table->string('TenND')->nullable();
            $table->string('DiaChi')->nullable();
            $table->string('SDT')->nullable();
            $table->string('Email')->nullable();
            $table->date('NgayDH');
            $table->integer('TrangThai')->default(2);

            $table->integer('PTTT');
            $table->timestamps();

            $table->foreign('MaND')->references('MaND')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
