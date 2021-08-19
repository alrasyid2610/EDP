<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_documents', function (Blueprint $table) {
            $table->id();
            $table->string('no_po', 255);
            $table->string('reciver', 255);
            $table->date('date_recived');
            $table->string('supplier', 255);
            $table->enum('destination', ['DNPI Pulogadung', 'DNPI Krawang']);
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
        Schema::dropIfExists('shipping_documents');
    }
}
