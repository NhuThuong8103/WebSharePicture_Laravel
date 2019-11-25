<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_album', function (Blueprint $table) {
            $table->increments('id'); // khoas chinhs
            $table->string('hinhanh_album',300);
            $table->integer('album_id')->unsigned(); // khoa ngoai
            $table->foreign('album_id')->references('id')->on('album'); // tao khoa ngoai vs album
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
        Schema::dropIfExists('chitiet_album');
    }
}
