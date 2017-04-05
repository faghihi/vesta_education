<?php

use Illuminate\Database\Seeder;

class CampaignCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign_course')->insert(['course_id' => '1','campaign_id'=>'1']);
    }
}
