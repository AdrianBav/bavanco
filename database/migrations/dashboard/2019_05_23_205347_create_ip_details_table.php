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

            $table->ipAddress('address');

            $table->string('city');
            $table->string('state_prov');
            $table->string('zipcode');
            $table->string('country_name');
            $table->string('country_flag');
            $table->string('continent_name');
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
