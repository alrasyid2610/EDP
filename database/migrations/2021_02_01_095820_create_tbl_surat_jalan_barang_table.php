<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSuratJalanBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_surat_jalan_barang', function (Blueprint $table) {
            $table->id();
            $table->string('no_po', 255);
            $table->string('penerima', 255);
            $table->date('tgl_terima');
            $table->string('supplier', 255);
            $table->enum('tujuan', ['DNPI Pulogadung', 'DNPI Krawang']);
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
        Schema::dropIfExists('tbl_surat_jalan_barang');
    }
}
