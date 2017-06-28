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
        DB::table('pack_course')->insert(['course_id' => '1','pack_id'=>'1']);
    }
}
