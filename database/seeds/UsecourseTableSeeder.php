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
        DB::table('usecourse')->insert(['start_date'=>'22 خرداد','time'=>'شنبه17:00- 11:00','price'=>'100','course_id'=>'1','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start_date'=>'22 خرداد','time'=>'شنبه17:00- 11:00','price'=>'80','course_id'=>'2','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start_date'=>'22 خرداد','time'=>'شنبه17:00- 11:00','price'=>'120','course_id'=>'1','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start_date'=>'22 خرداد','time'=>'شنبه17:00- 11:00','price'=>'150','course_id'=>'1','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start_date'=>'22 خرداد','time'=>'شنبه17:00- 11:00','price'=>'170','course_id'=>'2','online'=>'0','activated'=>'1']);
        DB::table('usecourse')->insert(['start_date'=>'22 خرداد','time'=>'شنبه17:00- 11:00','price'=>'150','course_id'=>'1','online'=>'0','activated'=>'1']);
    }
}
