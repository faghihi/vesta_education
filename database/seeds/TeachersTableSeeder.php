<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert(['name' => 'حسین فقیهی','occupation'=>'web developer','introduction'=>'back end']);
        DB::table('teachers')->insert(['name' => 'مینا شایگان','occupation'=>'web developer','introduction'=>'back end']);
        DB::table('teachers')->insert(['name' => 'روشنک میرزایی','occupation'=>'web designer','introduction'=>'front end']);
        DB::table('teachers')->insert(['name' => 'رضا قنبری','occupation'=>'web developer','introduction'=>'back end']);

    }
}
