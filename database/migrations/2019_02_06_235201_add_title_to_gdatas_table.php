<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleToGdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gdatas', function (Blueprint $table) {
            $table->integer('keyword_id')->unsigned()->index();
            
            // 外部キー制約
            $table->foreign('keyword_id')->references('id')->on('keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gdatas', function (Blueprint $table) {
            $table->dropColumn('keyword_id');
        });
    }
}
