<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaikhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',64)->unique();
            $table->string('matkhau',255);
            $table->datetime('thoigian_dncuoi');
            $table->string('ho',30);
            $table->string('ten',30);
            $table->string('anhdaidien',255)->default('user.png');
            $table->boolean('phephoatdong');
            $table->integer('id_phanquyen')->unsigned();
            $table->timestamps();
            $table->foreign('id_phanquyen')->references('id')->on('phanquyen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taikhoan');
    }
}
