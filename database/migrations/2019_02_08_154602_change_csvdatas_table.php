<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCsvdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('csvdatas', function (Blueprint $table) {
            $table->string('check_date')->change();
            $table->string('y_rank')->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('csvdatas', function (Blueprint $table) {
            $table->date('check_date')->change();
            $table->integer('y_rank')->change();
        });
    }
}
