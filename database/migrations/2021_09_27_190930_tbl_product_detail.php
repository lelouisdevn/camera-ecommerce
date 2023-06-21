<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblProductDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_detail', function (Blueprint $table) {
            $table->Increments('detailId');
            $table->string('ProductId');
            $table->string('size');
            $table->string('weight');
            $table->string('battery');
            $table->string('resolution');
            $table->string('fps');
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
        Schema::dropIfExists('tbl_product_detail');
    }
}
