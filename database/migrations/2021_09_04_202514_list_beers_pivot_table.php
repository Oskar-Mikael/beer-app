<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListBeersPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_beers_pivot', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('beer_id');
            $table->unsignedBigInteger('list_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_beers_pivot');
    }
}
