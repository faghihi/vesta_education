<?php

use Illuminate\Database\Seeder;

class ExcercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('excercises')->insert(['part' => '1','name'=>'exercise1','deadline'=>'10','course_id'=>'1']);
    }
}
