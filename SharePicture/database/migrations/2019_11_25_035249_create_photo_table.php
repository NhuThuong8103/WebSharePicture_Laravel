<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hinh_anh',300);
            $table->string('mota', 300);
            $table->string('tieude', 140);
            $table->boolean('chedo_photo');
            $table->integer('taikhoan_id_photo')->unsigned();
            $table->foreign('taikhoan_id_photo')->references('id')->on('taikhoan');
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
        Schema::dropIfExists('photo');
    }
}
