<?php

use Illuminate\Database\Seeder;

class PhanQuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('phanquyen')->insert([
        	'tenquyen'=>'admin',
        	'slug'=>'admin'
        ]);
        
        DB::table('phanquyen')->insert([
            'tenquyen'=>'user',
            'slug'=>'user'
        ]);
    }
}
