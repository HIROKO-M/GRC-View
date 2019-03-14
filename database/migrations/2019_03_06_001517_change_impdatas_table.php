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
//        ALTER TABLE 'impdates' ALTER COLUMN 'check_date' TYPE date;
        
        Schema::table('impdatas', function (Blueprint $table) {
            $table->date('check_date')->change();
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
            $table->dropColumn('check_date');
        });
    }
}
