<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_monitors', function (Blueprint $table) {
            // $table->id();
            $table->string('id_monitor', 10);
            $table->string('brand', 255);
            $table->enum('port_display', ['VGA', 'HDMI', 'DISPLAY PORT']);
            $table->string('monitor_fix_no', 255)->nullable();
            $table->date('monitor_date')->nullable();
            $table->string('edp_monitor_no', 255)->nullable();
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
        Schema::dropIfExists('tbl_monitors');
    }
}
