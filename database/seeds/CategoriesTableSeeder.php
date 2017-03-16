<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['name' => 'laravel','description'=>'hellohellohellohellohellohellohellohello']);
        DB::table('categories')->insert(['name' => 'laravel','description'=>'hellohellohellohellohellohellohello']);
        DB::table('categories')->insert(['name' => 'web','description'=>'front end learning']);
        DB::table('categories')->insert(['name' => 'laravel','description'=>'hellohellohellohello']);
        DB::table('categories')->insert(['name' => 'laravel','description'=>'hellohellohellohello']);
        DB::table('categories')->insert(['name' => 'laravel','description'=>'hellohellohellohello']);
        DB::table('categories')->insert(['name' => 'laravel','description'=>'hellohellohello']);
        DB::table('categories')->insert(['name' => 'laravel','description'=>'hellohellohello']);
        
    }
}
