<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsPhotoAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_photo_album', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->unsigned()->index()->nullable();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->string('name');
            $table->string('photographer');
            $table->string('summary');
            $table->text('subject');
            $table->integer('publish_on_home');
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
        Schema::drop('news_photo_album');
    }
}
