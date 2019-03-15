<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('check_date');
            $table->string('grc_site_name');
            $table->string('grc_site_url');
            $table->string('grc_keyword');
            $table->string('y_rank')->nullable();
            $table->string('y_change')->nullable();
            $table->integer('y_count')->unsigned()->index();
            $table->string('y_url')->nullable();
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
        Schema::drop('impdatas');
    }
}

/**
 * The development database settings. These get merged with the global settings.
 */

return array(
 'default' => array(
  'charset'	=> NULL,
  'identifier' => "\""      /* for PostgreSQL */
  ),
);
