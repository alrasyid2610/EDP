<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBonTeknikBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bon_teknik_barang', function (Blueprint $table) {
            $table->id();
            $table->string('no_bon', 255);
            $table->string('user', 255);
            $table->string('dept', 255);
            $table->date('tgl_buat');
            $table->text('keterangan');
            $table->string('penerima_bon', 255);
            $table->string('pelaksana', 255)->nullable();
            $table->date('tgl_terima_bon')->nullable();
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
        Schema::dropIfExists('tbl_bon_teknik_barang');
    }
}
