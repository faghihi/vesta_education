<?php

use Illuminate\Database\Seeder;

class CourseTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_tag')->insert(['course_id' => '1','tag_id'=>'1']);
    }
}
