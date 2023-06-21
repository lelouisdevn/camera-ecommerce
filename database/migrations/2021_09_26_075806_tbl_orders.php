<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->Increments('OrderId');
            $table->string('OrderReceivingPlace');
            $table->string('OrderPhoneNumber');
            $table->string('OrderTotalPay');
            $table->string('OrderName');
            $table->integer('UserId');
            $table->string('OrderStatus');
            $table->string('Payment_Id');
            $table->string('OrderTime');
            $table->integer('ShippingId');
            $table->integer('ShippingFee');
            
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
        Schema::dropIfExists('tbl_orders');
    }
}
