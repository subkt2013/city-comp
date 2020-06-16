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
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('with_post_id')->unsigned();
            $table->string('commenter_name');
            $table->text('body');
            $table->timestamps();
            $table->foreign('with_post_id')->references('id')->on('with_posts')->onUpdate('CASCADE')->onDelete('CASCADE');
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
