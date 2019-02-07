<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grc_site_name');
            $table->string('grc_site_url');
            $table->string('grc_keyword');
            $table->integer('y_rank')->unsigned()->index()->nullable();
            $table->string('y_change')->nullable();
            $table->integer('y_count')->unsigned()->index();
            $table->string('y_url');
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
        Schema::drop('gdatas');
    }
}
