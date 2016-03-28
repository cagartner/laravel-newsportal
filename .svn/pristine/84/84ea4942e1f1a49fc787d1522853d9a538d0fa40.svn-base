<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsVideoAlbumVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_video_album_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_video_album_id')->unsigned()->index();
            $table->foreign('news_video_album_id')->references('id')->on('news_video_album')->onDelete('cascade');
            $table->string('video');
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
        Schema::drop('news_video_album_videos');
    }
}
