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
        DB::table('usecourse')->insert(['start' => '9-9-9','price'=>'10','course_id'=>'1','online'=>'0']);
    }
}
