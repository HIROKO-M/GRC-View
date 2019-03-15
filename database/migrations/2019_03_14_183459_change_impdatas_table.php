<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeImpdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('impdatas', function (Blueprint $table) {
            $table->string('y_rank')->nullable()->change();
            $table->integer('y_count')->nullable()->change();
            $table->integer('g_count')->nullable()->change();
            
            DB::statement('ALTER TABLE "impdatas" ALTER "check_date" TYPE DATE USING check_date::date;');
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
            $table->dropColumn('y_rank');
            $table->dropColumn('check_date');
            $table->dropColumn('y_count');
            $table->dropColumn('g_count');

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