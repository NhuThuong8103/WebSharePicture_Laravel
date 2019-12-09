<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class TaiKhoanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taikhoan')->insert([
        	'email'				=>'sangnguyen@gmail.com',
        	'password'			=>Hash::make('123456'),
        	'thoigian_dncuoi'	=>Carbon::now('GMT+7'),
        	'ho'			=>'sang',
        	'ten'			=>'nguyen',
        	'anhdaidien'			=>'avatar.png',
        	'phephoatdong'			=>true,
        	'id_phanquyen'	=>1
        ]);
        DB::table('taikhoan')->insert([
            'email'             =>'sangnguyen07dhth@gmail.com',
            'password'          =>Hash::make('123456'),
            'thoigian_dncuoi'   =>Carbon::now('GMT+7'),
            'ho'            =>'sang',
            'ten'           =>'nguyen',
            'anhdaidien'            =>'avatar.png',
            'phephoatdong'          =>true,
            'id_phanquyen'  =>2
        ]);
    }
}
