<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogkeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogkeywords', function (Blueprint $table) {
            $table->bigIncrements('KeywordID');
            $table->integer('BlogID');
            $table->foreign('BlogID')->references('blog')->on('BlogID');
            $table->String('KeywordName');
            $table->tinyInteger('Status')->default('0');
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
        Schema::dropIfExists('blogkeywords');
    }
}
