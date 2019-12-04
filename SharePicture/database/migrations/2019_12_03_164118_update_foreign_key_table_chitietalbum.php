<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyTableChitietalbum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chitiet_album', function (Blueprint $table) {
            $table->dropForeign('chitiet_album_album_id_foreign'); 
            $table->foreign('album_id')->references('id')->on('album')->onDelete('cascade')->change(); // tao khoa ngoai vs album
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chitiet_album', function (Blueprint $table) {
            //
        });
    }
}
