<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert(['part' => '0','name'=>'php_part1','type'=>'1','father'=>'0','duration'=>'12','course_id'=>'1']);
    }
}
