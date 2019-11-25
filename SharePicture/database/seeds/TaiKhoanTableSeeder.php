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
        	'email'				=>'sangnguyen07dhth@gmail.com',
        	'password'			=>Hash::make('123456'),
        	'thoigian_dncuoi'	=>Carbon::now('GMT+7'),
        	'ho'			=>'sang',
        	'ten'			=>'nguyen',
        	'anhdaidien'			=>'sang.png',
        	'phephoatdong'			=>true,
        	'quyen_id'	=>1
        ]);
        DB::table('taikhoan')->insert([
            'email'             =>'sangnguyen07dhth01@gmail.com',
            'password'           =>Hash::make('123456'),
            'thoigian_dncuoi'   =>Carbon::now('GMT+7'),
            'ho'            =>'sang',
            'ten'           =>'nguyen',
            'anhdaidien'            =>'sang.png',
            'phephoatdong'          =>true,
            'quyen_id'  =>2
        ]);
    }
}
