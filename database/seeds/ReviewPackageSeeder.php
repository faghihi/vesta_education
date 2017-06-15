<?php

use Illuminate\Database\Seeder;

class ReviewPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviewpackage')->insert(['comment' => 'lie lie','user_id'=>'1','package_id'=>'1','rate'=>'4','enable'=>'1']);
        DB::table('reviewpackage')->insert(['comment' => 'lo lo','user_id'=>'2','package_id'=>'1','rate'=>'3','enable'=>'1']);
        DB::table('reviewpackage')->insert(['comment' => 'lo lo','user_id'=>'3','package_id'=>'2','rate'=>'5','enable'=>'1']);
        DB::table('reviewpackage')->insert(['comment' => 'lo lo','user_id'=>'4','package_id'=>'1','rate'=>'1','enable'=>'1']);
        DB::table('reviewpackage')->insert(['comment' => 'lo lo','user_id'=>'1','package_id'=>'1','rate'=>'2','enable'=>'1']);
        DB::table('reviewpackage')->insert(['comment' => 'lo lo','user_id'=>'1','package_id'=>'2','rate'=>'1','enable'=>'1']);
        DB::table('reviewpackage')->insert(['comment' => 'lo lo','user_id'=>'1','package_id'=>'1','rate'=>'4','enable'=>'1']);
        DB::table('reviewpackage')->insert(['comment' => 'lo lo','user_id'=>'1','package_id'=>'2','rate'=>'5','enable'=>'1']);
    }
}
