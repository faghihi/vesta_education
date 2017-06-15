<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('packages')->insert(['title' => 'بسته  آموزشی طراحی وب', 'image' => NULL, 'description' => 'خط اول توضیحات 
خط دوم توضیحات 
خط سوم توضیحات 
خط چهارم توضیحات 
خط پنجم توضیحات 
خط ششم توضیحات ', 'open_time' => '2012-12-12 00:00:00', 'requirement' => 'خط اول پیش نیاز
خط دوم پیش نیاز
خط سوم پیش نیاز
خط چهارم پیش نیاز
خط پنجم پیش نیاز
خط ششم پیش نیاز', 'condition' => 'خط اول شرایط
خط دوم شرایط
خط سوم شرایط
خط چهارم شرایط
خط پنجم شرایط
خط ششم شرایط', 'work_description' => 'خط اول توضیحات کار
خط دوم توضیحات کار
خط سوم توضیحات کار
خط چهارم توضیحات کار
خط پنجم توضیحات کار
خط ششم توضیحات کار', 'work_start' => '2012-12-12 00:00:00', 'goal' => 'خط اول هدف
خط دوم هدف
خط سوم هدف
خط چهارم هدف
خط پنجم هدف
خط ششم هدف', 'duration' => '12', 'price' => '244.00']);

        DB::table('packages')->insert(['title' => 'package', 'open_time' => '12-12-12', 'work_start' => '10-10-10', 'duration' => '1', 'price' => '12']);
    }
}
