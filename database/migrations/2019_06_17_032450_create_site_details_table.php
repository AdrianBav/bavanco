<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('slug', 50)->unique();

            $table->string('item1', 25);
            $table->unsignedSmallInteger('number1');

            $table->string('item2', 25);
            $table->unsignedSmallInteger('number2');

            $table->string('info', 25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_details');
    }
}
