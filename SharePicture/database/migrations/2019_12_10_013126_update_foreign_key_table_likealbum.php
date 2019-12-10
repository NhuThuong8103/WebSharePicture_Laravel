<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyTableLikealbum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('likealbum', function (Blueprint $table) {
            $table->dropForeign('likealbum_taikhoan_id_foreign'); 
            $table->foreign('taikhoan_id')->references('id')->on('taikhoan')->onDelete('cascade')->change(); // tao khoa ngoai vs taikhoan
            $table->dropForeign('likealbum_album_id_foreign'); 
            $table->foreign('album_id')->references('id')->on('album')->onDelete('cascade')->change(); // tao khoa ngoai vs photo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('likealbum', function (Blueprint $table) {
            //
        });
    }
}
