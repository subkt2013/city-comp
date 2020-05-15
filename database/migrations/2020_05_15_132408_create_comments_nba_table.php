<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsNbaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_nba', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id_nba');
            $table->string('commenter_name');
            $table->text('body');
            $table->timestamps();
            $table->foreign('post_id_nba')->references('id')->on('posts_nba');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_nba');
    }
}
