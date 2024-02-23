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
        Schema::create('konven_cessie_sebelums', function (Blueprint $table) {
            $table->id();
            $table->string('tanggaldibuat');
            $table->string('nomorsurat');
            $table->string('namadebitur');
            $table->string('nomorperjanjiankredit');
            $table->string('tanggalperjanjian');
            $table->mediumText('alamatdebitur');
            $table->string('tanggalpembukuanbank');
            $table->string('pokok');
            $table->string('denda');
            $table->string('bunga');
            $table->string('lainlain');
            $table->string('cpmenangani');
            $table->string('email');
            $table->string('phone');
            $table->string('tanggaltenggatwaktu');
            $table->string('privateofficer');
            $table->string('privatedphead');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konven_cessie_sebelums');
    }
};
