<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PhanQuyenTableSeeder::class);
        $this->call(TaiKhoanTableSeeder::class);
    }
}
