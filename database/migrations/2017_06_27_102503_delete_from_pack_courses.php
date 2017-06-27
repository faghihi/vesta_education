<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteFromPackCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pack_course', function (Blueprint $table) {
            $table->dropColumn('start_time');
            $table->dropColumn('time');
            $table->dropColumn('location');
            $table->dropColumn('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pack_course', function (Blueprint $table) {
            $table->string('start_date');
            $table->string('time');
            $table->string('location')->nullable();
            $table->double('price', 15, 2)->default(0.0);
        });
    }
}
