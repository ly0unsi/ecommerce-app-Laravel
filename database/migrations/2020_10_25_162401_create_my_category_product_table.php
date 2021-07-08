<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_category_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('my_category_cid');
            $table->foreign('my_category_cid')
            ->references('cid')
            ->on('mycategories')
            ->onDelete('cascade');
           
            $table->unsignedBigInteger('product_pid');
            $table->foreign('product_pid')
            ->references('pid')
            ->on('products')
            ->onDelete('cascade');
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
        Schema::dropIfExists('category_product');
    }
}
