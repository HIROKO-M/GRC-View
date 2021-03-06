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
            $table->string('g_rank')->nullable()->change();
 
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
            $table->dropColumn('g_rank');
        });
    }
}
