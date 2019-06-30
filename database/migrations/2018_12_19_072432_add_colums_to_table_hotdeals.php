<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToTableHotdeals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hot_deals', function (Blueprint $table) {
            $table->string('manufacture')->after('detail');
            $table->string('rating')->after('manufacture');
            $table->string('availability')->after('rating');
            $table->string('brand')->after('availability');
            $table->string('delivery')->after('brand');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hot_deals', function (Blueprint $table) {
            //
        });
    }
}
