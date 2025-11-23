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
        Schema::create('outputs', function (Blueprint $table) {
              $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->string('warna');
            $table->string('ukuran');
            $table->integer('stok');
            $table->integer('masuk');
            $table->integer('keluar');
            $table->decimal('harga', 15, 2);
            $table->decimal('keuntungan', 15, 2);
            $table->text('keterangan');
            $table->text('status');
            $table->text('pembayaran');
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
        Schema::dropIfExists('outputs');
    }
};
