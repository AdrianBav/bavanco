<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_agent', 255)->nullable()->unique();
            $table->string('device');
            $table->string('platform');        
            $table->string('platform_version');
            $table->string('browser');
            $table->string('browser_version');
            $table->boolean('isDesktop');
            $table->boolean('isTablet');            
            $table->boolean('isPhone');     
            $table->boolean('isRobot');       
            $table->string('robot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visit_agents');
    }
}
