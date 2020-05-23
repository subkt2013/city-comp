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
        Schema::create('nba_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nba_post_id');
            $table->string('commenter_name');
            $table->text('body');
            $table->timestamps();
            $table->foreign('nba_post_id')->references('id')->on('nba_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nba_comments');
    }
}
