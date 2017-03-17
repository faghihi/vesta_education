<?php

use Illuminate\Database\Seeder;

class ReviewCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviewcourse')->insert(['comment' => 'lie lie','user_id'=>'1','course_id'=>'1','rate'=>'4','enable'=>'1']);
        DB::table('reviewcourse')->insert(['comment' => 'lo lo','user_id'=>'1','course_id'=>'1','rate'=>'3','enable'=>'1']);
        DB::table('reviewcourse')->insert(['comment' => 'lo lo','user_id'=>'1','course_id'=>'2','rate'=>'5','enable'=>'1']);
        DB::table('reviewcourse')->insert(['comment' => 'lo lo','user_id'=>'1','course_id'=>'3','rate'=>'1','enable'=>'1']);
        DB::table('reviewcourse')->insert(['comment' => 'lo lo','user_id'=>'1','course_id'=>'3','rate'=>'2','enable'=>'1']);
        DB::table('reviewcourse')->insert(['comment' => 'lo lo','user_id'=>'1','course_id'=>'4','rate'=>'1','enable'=>'1']);
        DB::table('reviewcourse')->insert(['comment' => 'lo lo','user_id'=>'1','course_id'=>'4','rate'=>'4','enable'=>'1']);
        DB::table('reviewcourse')->insert(['comment' => 'lo lo','user_id'=>'1','course_id'=>'4','rate'=>'5','enable'=>'1']);
    }
}
