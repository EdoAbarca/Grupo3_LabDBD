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
        Schema::create('song_genres', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('song_id')->nullable();
            $table->foreign('song_id')->references('id')->on('songs');

            $table->unsignedBigInteger('genre_id')->nullable();
            $table->foreign('genre_id')->references('id')->on('genres');
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
        Schema::dropIfExists('song_genres');
    }
};
