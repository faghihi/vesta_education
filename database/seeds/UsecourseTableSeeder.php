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
        DB::table('usecourse')->insert(['start' => '6 اردیبهشت','price'=>'100','course_id'=>'1','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start' => '23 اردیبهشت','price'=>'80','course_id'=>'2','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start' => '31 خرداد','price'=>'120','course_id'=>'1','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start' => '6 اردیبهشت','price'=>'150','course_id'=>'1','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start' => '23 اردیبهشت','price'=>'170','course_id'=>'2','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start' => '31 خرداد','price'=>'150','course_id'=>'1','online'=>'0','activated'=>'1']);
    }
}
