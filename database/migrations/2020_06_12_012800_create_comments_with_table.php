<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsWithTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('with_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('with_post_id');
            $table->string('commenter_name');
            $table->text('body');
            $table->timestamps();
            $table->foreign('with_post_id')->references('id')->on('with_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('with_comments');
    }
}
