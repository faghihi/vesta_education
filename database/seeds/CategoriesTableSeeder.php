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
        DB::table('categories')->insert(['name' => 'HTML','description'=>'با HTML می توانید وب سایت خودتان را درست کنید.
یادگیری HTML آسان است - شما از آن لذت خواهید برد.
این آموزش HTML شامل صدها نمونه HTML.

با ویرایشگر HTML آنلاین ما، شما می توانید HTML را ویرایش کنید، و کلیک بر روی یک دکمه برای مشاهده نتیجه.
']);
        DB::table('categories')->insert(['name' => 'CSS','description'=>'CSS زبانی است که سبک اطلاعات HTML را توصیف می کند.
CSS چگونگی نمایش عناصر HTML را توصیف می کند.
']);
        DB::table('categories')->insert(['name' => 'JavaScript','description'=>'JavaScript زبان برنامه نویسی HTML و وب است.']);
        DB::table('categories')->insert(['name' => 'SQL','description'=>'SQL یک زبان استاندارد بزای ذخیره سازی ، تدوین و بازیابی اطلاعات در پایگاه داده هاست.']);
        DB::table('categories')->insert(['name' => 'PHP','description'=>'PHP یک زبان سرور برنامه نویسی، و یک ابزار قدرتمند برای ساخت صفحات وب پویا و تعاملی است.

PHP به طور گسترده ای استفاده می شود، آزاد و جایگزین کارآمد به رقبای مانند ASP مایکروسافت است.']);
        DB::table('categories')->insert(['name' => 'Bootstrap','description'=>'بوت استرپ محبوب ترین HTML، CSS، و چارچوب جاوا اسکریپت برای توسعه پاسخگو، تلفن همراه-اول وب سایت است.

بوت استرپ کاملا رایگان برای دانلود و استفاده کنید!']);
        DB::table('categories')->insert(['name' => 'jQuery','description'=>'jQuery یک کتابخانه جاوا اسکریپت است.

جی کوئری تا حد زیادی ساده برنامه نویسی جاوا اسکریپت.

جی کوئری آسان برای یادگیری است.']);
        DB::table('categories')->insert(['name' => 'AngularJS','description'=>'AngularJS را گسترش HTML با ویژگی های جدید است.
از AngularJS مناسب برای صفحه نرم افزار تنها (چشمه های معدنی) است.

AngularJS را آسان برای یادگیری است.

بدانید از AngularJS در حال حاضر!']);
        DB::table('categories')->insert(['name' => 'NodeJs','description'=>'AngularJS را گسترش HTML با ویژگی های جدید است.
از AngularJS مناسب برای صفحه نرم افزار تنها (چشمه های معدنی) است.

AngularJS را آسان برای یادگیری است.

بدانید از AngularJS در حال حاضر!']);
    }
}
