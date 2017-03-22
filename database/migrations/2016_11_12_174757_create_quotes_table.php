<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{

    public function up()
    {
        Schema::create('quotes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->text('content');
            $table->string('author_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('likes_count')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('quotes');
    }
}
