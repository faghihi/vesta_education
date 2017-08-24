<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeExcercisesUsecourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('excercises', function($table) {
            $table->dropForeign('excercises_course_id_foreign');
        });
        Schema::table('excercises', function($table) {
            $table->foreign('course_id')
                ->references('id')
                ->on('usecourse')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
