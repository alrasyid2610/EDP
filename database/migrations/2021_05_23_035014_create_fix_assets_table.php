<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fix_assets', function (Blueprint $table) {
            $table->id();
            $table->string('fixed_asset_number', 10);
            $table->string('edp_fixed_asset_number', 255);
            $table->date('fixed_asset_date');
            $table->string('item_type', 100);
            $table->string('status', 100);
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
        Schema::dropIfExists('fix_assets');
    }
}
