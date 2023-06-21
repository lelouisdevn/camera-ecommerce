<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->Increments('UserId');
            $table->string('UserName');
            $table->string('UserPhoneNumber');
            $table->string('UserEmail');
            $table->string('UserDOB');
            $table->boolean('UserGender');
            $table->string('UserAddress');
            $table->string('UserJoiningTime');
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
        Schema::dropIfExists('tbl_users');
    }
}
