<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->ipAddress('address')->unique();

            $table->string('city')->nullable();
            $table->string('state_prov')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country_name')->nullable();
            $table->string('country_flag')->nullable();
            $table->string('continent_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip_details');
    }
}
