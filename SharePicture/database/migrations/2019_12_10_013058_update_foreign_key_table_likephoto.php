<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyTableLikephoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('likephoto', function (Blueprint $table) {
            $table->dropForeign('likephoto_taikhoan_id_foreign'); 
            $table->foreign('taikhoan_id')->references('id')->on('taikhoan')->onDelete('cascade')->change(); // tao khoa ngoai vs taikhoan
            $table->dropForeign('likephoto_photo_id_foreign'); 
            $table->foreign('photo_id')->references('id')->on('photo')->onDelete('cascade')->change(); // tao khoa ngoai vs photo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('likephoto', function (Blueprint $table) {
            //
        });
    }
}
