<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsPhotoAlbumPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_photo_album_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_photo_album_id')->unsigned()->index();
            $table->foreign('news_photo_album_id')->references('id')->on('news_photo_album')->onDelete('cascade');
            $table->string('image');
            $table->string('original_size');
            $table->string('small');            
            $table->string('thumbnail');
            $table->string('medium');
            $table->string('large');
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
        Schema::drop('news_photo_album_photos');
    }
}
