<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblHelpdesk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_helpdesk', function (Blueprint $table) {
            $table->increments('HelpdeskId');
            $table->string('HelpdeskEmail');
            $table->string('HelpdeskContent');
            $table->integer('ProductId');
            $table->integer('OrderId');
            $table->integer('UserId');
            $table->string('HelpdeskTime');
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
        Schema::dropIfExists('tbl_helpdesk');
    }
}
