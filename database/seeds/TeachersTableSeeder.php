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
        DB::table('teachers')->insert(['name' => 'faghihi','occupation'=>'hellohellohello','introduction'=>'hellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohello']);
        DB::table('teachers')->insert(['name' => 'me','occupation'=>'hellohellohello','introduction'=>'hellohellohellohellohello']);
    }
}
