<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblNewsComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_news_comment', function (Blueprint $table) {
            $table->increments('NewsCommentId');
            $table->integer('UserId');
            $table->integer('NewsId');
            $table->text('NewsCommentContent');
            $table->string('NewsCommentTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_news_comment');
    }
}
