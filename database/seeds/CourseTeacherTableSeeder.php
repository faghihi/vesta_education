<?php

use Illuminate\Database\Seeder;

class CourseTeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_teacher')->insert(['course_id' => '1','teacher_id'=>'1']);
    }
}
