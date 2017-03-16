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
        DB::table('coursepart')->insert(['start' => '09:00:00','end'=>'00:00:12','date'=>'2012-12-12','duration'=>'12','course_id'=>'1']);
    }
}
