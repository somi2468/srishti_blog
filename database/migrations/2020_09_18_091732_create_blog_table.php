<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('BlogID');
            $table->String('Name');
            $table->integer('BlogCategoryID');
            $table->foreign('BlogCategoryID')->references('blogcategory')->on('CategoryID');
            $table->String('Bannerimage')->default('0');
            $table->String('Bannerimagepath')->default('0');
            $table->String('Mainimage')->default('0');
            $table->String('Mainimagepath')->default('0');
            $table->String('Description');
            $table->tinyInteger('Status');
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
        Schema::dropIfExists('blog');
    }
}
