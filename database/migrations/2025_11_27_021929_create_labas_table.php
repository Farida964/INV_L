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
        Schema::create('labas', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('produkpembelian');
            $table->integer('qty');
            $table->string('an');
            $table->integer('totalpembayaran');
            $table->integer('keuntungan');
            $table->integer('totalkeuntungan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labas');
    }
};
