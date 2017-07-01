<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeVoyagerMigrationchange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->boolean('voyagertags')->nullable();
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->boolean('voyagertags')->nullable();
        });
        Schema::table('usecourse', function (Blueprint $table) {
            $table->boolean('voyagerteachers')->nullable();
        });
        Schema::table('packages', function (Blueprint $table) {
            $table->boolean('voyagercourses')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn('voyagertags');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('voyagertags');
        });
        Schema::table('usecourse', function (Blueprint $table) {
            $table->dropColumn('voyagerteachers');
        });
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('voyagercourses');
        });
    }
}
