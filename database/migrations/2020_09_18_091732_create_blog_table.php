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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            
            $table->integer('BlogID');
            $table->String('Name');
            $table->integer('BlogCategoryID');
            $table->foreign('BlogCategoryID')->references('blogcategory')->on('CategoryID');
            $table->String('Bannerimage');
            $table->String('Mainimage');
            $table->String('Description');
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
        Schema::dropIfExists('blog');
    }
}
