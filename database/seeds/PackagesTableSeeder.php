<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert(['title' => 'package','open_time'=>'12-12-12','work_start'=>'10-10-10','duration'=>'1','price'=>'12']);
    }
}
