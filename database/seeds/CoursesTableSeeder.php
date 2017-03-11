<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert(['name' => 'php','level'=>'0','introduction'=>'salam','category_id'=>'1']);

    }
}
