<?php

use Illuminate\Database\Seeder;

class TakeCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('takecourse')->insert(['user_id' => '1','course_id'=>'1','paid'=>'1','discount_used'=>'1']);
    }
}
