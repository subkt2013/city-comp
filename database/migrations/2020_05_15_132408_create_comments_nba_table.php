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
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('nba_post_id')->unsigned();
            $table->string('commenter_name');
            $table->text('body');
            $table->timestamps();
            $table->foreign('nba_post_id','kycs_ibfk_2')->references('id')->on('nba_posts')->onUpdate('CASCADE')->onDelete('CASCADE');
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
