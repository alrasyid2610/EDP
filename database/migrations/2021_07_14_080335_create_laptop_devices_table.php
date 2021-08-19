<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptop_devices', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->string('processor', 255)->nullable();
            $table->string('os', 255)->nullable();
            $table->string('ram', 5)->nullable();
            $table->string('storage', 5)->nullable();
            $table->string('type_storage', 8)->nullable();
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
        Schema::dropIfExists('laptop_devices');
    }
}
