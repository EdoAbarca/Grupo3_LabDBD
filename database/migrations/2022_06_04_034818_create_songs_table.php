<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('song_name',30);
            $table->time('duration');
            $table->integer('stream');
            $table->date('release_date');
            $table->boolean('parental_advisory');
            $table->integer('rate');
            $table->foreign('album_id')->references('id')->on('albums');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->boolean('delete');
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
        Schema::dropIfExists('songs');
    }
};
