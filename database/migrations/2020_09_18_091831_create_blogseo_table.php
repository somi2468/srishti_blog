<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogseoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogseo', function (Blueprint $table) {
            $table->bigIncrements('SeoID');
            $table->String('MetaTitle');
            $table->String('MetaDescription');
            $table->String('MetaKeyword');
            $table->Boolean('IndexFollow');
            $table->integer('BlogID');
            $table->foreign('BlogID')->references('blog')->on('BlogID');
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
        Schema::dropIfExists('blogseo');
    }
}
