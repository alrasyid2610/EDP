<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblComputerUseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_computer_use', function (Blueprint $table) {
            $table->string('id_penggunaan', 10);
            $table->string('id_komputer', 10);
            $table->string('id_monitor', 10);
            $table->string('id_user', 10);
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
        Schema::dropIfExists('tbl_computer_use');
    }
}
