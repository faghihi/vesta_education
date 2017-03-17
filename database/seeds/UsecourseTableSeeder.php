<?php

use Illuminate\Database\Seeder;

class UsecourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usecourse')->insert(['start' => '6 اردیبهشت','price'=>'100000','course_id'=>'1','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start' => '23 اردیبهشت','price'=>'800000','course_id'=>'2','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start' => '31 خرداد','price'=>'1200000','course_id'=>'1','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start' => '6 اردیبهشت','price'=>'150000','course_id'=>'1','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start' => '23 اردیبهشت','price'=>'170000','course_id'=>'2','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start' => '31 خرداد','price'=>'150000','course_id'=>'1','online'=>'0','activated'=>'1']);
    }
}
