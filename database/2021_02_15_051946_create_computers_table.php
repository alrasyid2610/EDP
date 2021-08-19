<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('pc_name', 255);
            $table->string('brand', 255); 
            $table->string('processor', 255);
            $table->string('sistem_operasi', 255);
            $table->string('ram', 4);
            $table->string('hdd', 5);
            $table->string('ip', 25);
            $table->enum('internet', ['Yes', 'No']);
            $table->string('ms_office', 255);
            $table->string('antivirus', 255);
            $table->enum('ups', ['Yes', 'No']);
            $table->enum('wsus', ['Yes', 'No']);
            $table->enum('click_one', ['Yes', 'No']);
            $table->enum('ax', ['Yes', 'No']);
            $table->enum('schedule_ppc', ['Yes', 'No']); 
            $table->string('kom_fix_no', 255)->nullable()->default('Tidak Ada');
            $table->date('kom_date')->nullable();
            $table->string('kom_edp_no', 255)->nullable()->default('Tidak Ada');
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
        Schema::dropIfExists('computers');
    }
}
