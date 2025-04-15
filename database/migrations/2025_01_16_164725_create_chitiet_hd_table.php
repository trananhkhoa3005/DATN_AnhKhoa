<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_hd', function (Blueprint $table) {
            
$table->id();
$table->unsignedBigInteger('MaDH');
$table->unsignedBigInteger('MaSP');
$table->integer('SLMua');
$table->decimal('DonGiaMua', 18, 0);
$table->timestamps();

$table->foreign('MaDH')->references('MaDH')->on('don_hangs')->onDelete('cascade');
$table->foreign('MaSP')->references('MaSP')->on('san_phams')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiet_hd');
    }
};
