<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->Increments('ProductId');
            $table->integer('CategoryId');
            $table->integer('TrademarkId');
            $table->string('ProductName');
            $table->text('ProductDescription');
            $table->text('ProductContent');
            $table->string('ProductImage');
            $table->integer('ProductQuantity');
            $table->string('ProductPrice');
            $table->integer('ProductStatus');
            $table->integer('ProductSaled');
            $table->integer('ProductSlider');
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
        Schema::dropIfExists('tbl_product');
    }
}
