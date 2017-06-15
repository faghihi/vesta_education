<?php

use Illuminate\Database\Seeder;

class PackageCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pack_course')->insert(['course_id' => '1','pack_id'=>'1','price'=>'12','start_date'=>'22 خرداد','time'=>'شنبه17:00- 11:00','location'=>'دانشکده ریاضی - کلاس 203']);
    }
}
