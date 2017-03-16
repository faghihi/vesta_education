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
        DB::table('teachers')->insert(['name' => 'faghihi','occupation'=>'hellohellohello','introduction'=>'hellohellohellohellohellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'	hellohellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>' hellohellohellohellohellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>' hellohellohellohellohellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'  hellohellohellohellohellohellohellohellohellohellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>' hellohellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohellohellohellohellohellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohellohellohellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohellohellohellohellohellohellohellohellohellohellohellohellohellohello']);
    }
}
