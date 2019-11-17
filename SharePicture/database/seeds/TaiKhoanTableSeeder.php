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
        	'email'				=>'sang12@gmail.com',
        	'matkhau'			=>Hash::make('123456'),
        	'thoigian_dncuoi'	=>Carbon::now('GMT+7'),
        	'ho'			=>'sang',
        	'ten'			=>'nguyen',
        	'anhdaidien'			=>'sang.png',
        	'phephoatdong'			=>true,
        	'quyen_id'	=>1
        ]);
    }
}
