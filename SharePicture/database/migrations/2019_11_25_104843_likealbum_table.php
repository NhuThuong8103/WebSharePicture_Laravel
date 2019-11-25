<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LikealbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likealbum', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('so_like_album')->default(0);
            $table->integer('taikhoan_id')->unsigned();
            $table->integer('album_id')->unsigned();
            $table->foreign('taikhoan_id')->references('id')->on('taikhoan');
            $table->foreign('album_id')->references('id')->on('album');
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
        Schema::dropIfExists('likealbum');
    }
}
