<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleToImpdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('impdatas', function (Blueprint $table) {
            $table->string('g_rank')->nullable();
            $table->string('g_change')->nullable();
            $table->integer('g_count')->unsigned()->index();
            $table->string('g_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('impdatas', function (Blueprint $table) {
            $table->dropColumn('g_rank');
            $table->dropColumn('g_change');
            $table->dropColumn('g_count');
            $table->dropColumn('g_url');
        });
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
