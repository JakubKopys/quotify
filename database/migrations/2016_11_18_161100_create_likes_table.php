<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    public function up()
    {
        Schema::create('likes', function(Blueprint $table) {
           $table->increments("id");
           $table->integer('user_id')->unsigned()->index();
           $table->integer('quote_id')->unsigned()->index();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');

           $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('likes');
    }
}
