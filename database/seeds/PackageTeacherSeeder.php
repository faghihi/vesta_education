<?php

use Illuminate\Database\Seeder;

class PackageTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pack_teacher')->insert(['teacher_id' => '1','pack_id'=>'1']);
    }
}
