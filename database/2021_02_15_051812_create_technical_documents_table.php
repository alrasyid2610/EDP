<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicalDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_documents', function (Blueprint $table) {
            $table->id();
            $table->string('no_bon', 255);
            $table->string('user', 255);
            $table->string('departement', 255);
            $table->date('create_date');
            $table->text('description');
            $table->string('document_recipient', 255);
            $table->string('executor', 255)->nullable();
            $table->date('recived_date')->nullable();
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
        Schema::dropIfExists('technical_documents');
    }
}
