<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LikephotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likephoto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('solike')->default(0);
            $table->integer('taikhoan_id')->unsigned();
            $table->integer('photo_id')->unsigned();
            $table->foreign('taikhoan_id')->references('id')->on('taikhoan');
            $table->foreign('photo_id')->references('id')->on('photo');
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
        Schema::dropIfExists('likephoto');
    }
}
