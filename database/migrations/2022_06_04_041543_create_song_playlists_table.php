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
        Schema::create('song_playlists', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('playlist_id')->nullable();
            $table->foreign('playlist_id')->references('id')->on('playlists');

            $table->unsignedBigInteger('song_id')->nullable();
            $table->foreign('song_id')->references('id')->on('songs');
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
        Schema::dropIfExists('song_playlists');
    }
};
