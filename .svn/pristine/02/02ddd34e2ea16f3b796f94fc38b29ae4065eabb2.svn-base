<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpinionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinion_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opinion_id')->unsigned()->index();
            $table->foreign('opinion_id')->references('id')->on('opinion')->onDelete('cascade');
            $table->string('option');
            $table->integer('counter');
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
        Schema::drop('opinion_options');
    }
}
