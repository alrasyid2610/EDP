<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_users', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 10);
            $table->string('nama', 255);
            $table->string('email', 255)->nullable();
            $table->string('user_logon', 255);
            $table->string('password', 255);
            $table->string('section', 255);
            $table->string('position', 255);
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
        Schema::dropIfExists('computer_users');
    }
}
