<?php

use Illuminate\Database\Seeder;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->insert(['title' => 'new year','description'=>'new year','discount_type'=>'0','discount_value'=>'12']);
    }
}
