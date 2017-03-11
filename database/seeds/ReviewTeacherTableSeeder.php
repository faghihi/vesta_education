<?php

use Illuminate\Database\Seeder;

class ReviewTeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviewteacher')->insert(['comment' => 'go go','user_id'=>'1','teacher_id'=>'1','rate'=>'4','enable'=>'1']);
    }
}
