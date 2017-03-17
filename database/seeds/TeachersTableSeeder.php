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
        DB::table('teachers')->insert(['name' => 'faghihi','occupation'=>'web developer','introduction'=>'back end']);
        DB::table('teachers')->insert(['name' => 'mirzaie','occupation'=>'web designer','introduction'=>'front end']);
        DB::table('teachers')->insert(['name' => 'shaigan','occupation'=>'web developer','introduction'=>'back end']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hello','introduction'=>'hello']);

    }
}
