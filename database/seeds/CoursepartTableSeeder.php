<?php

use Illuminate\Database\Seeder;

class CoursepartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coursepart')->insert(['start' => 'ساعت 12:00','end'=>'ساعت 17:00','date'=>'5 شهریور','duration'=>'12','course_id'=>'1']);
        DB::table('coursepart')->insert(['start' => 'ساعت 15:00','end'=>'ساعت 17:00','date'=>'5 شهریور','duration'=>'12','course_id'=>'2']);
        DB::table('coursepart')->insert(['start' => 'ساعت 17:00','end'=>'ساعت 17:00','date'=>'5 شهریور','duration'=>'12','course_id'=>'3']);
        DB::table('coursepart')->insert(['start' => 'ساعت 19:00','end'=>'ساعت 17:00','date'=>'5 شهریور','duration'=>'12','course_id'=>'4']);
        DB::table('coursepart')->insert(['start' => 'ساعت 20:00','end'=>'ساعت 17:00','date'=>'5 شهریور','duration'=>'12','course_id'=>'5']);
        DB::table('coursepart')->insert(['start' => 'ساعت 22:00','end'=>'ساعت 17:00','date'=>'5 شهریور','duration'=>'12','course_id'=>'6']);
    }
}
