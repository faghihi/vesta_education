<?php

use Illuminate\Database\Seeder;

class TeacherTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teacher_tag')->insert(['teacher_id' => '1','tag_id'=>'1']);
    }
}
