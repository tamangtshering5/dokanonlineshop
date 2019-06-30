<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('image');
            $table->string('scroll_image');
            $table->string('new_price');
            $table->string('old_price');
            $table->string('rating');
            $table->string('brand');
            $table->string('availability');
            $table->string('manufactured');
            $table->string('delivery');
            $table->string('detail');
            $table->string('new');
            $table->string('featured');
            $table->string('hot');
            $table->string('best');
            $table->string('discount');
            $table->string('special');
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
        Schema::dropIfExists('products');
    }
}
