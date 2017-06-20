<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePackCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pack_course', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('pack_id')->unsigned();
            $table->string('start_date');
            $table->string('time');
            $table->string('location')->nullable();
            $table->double('price', 15, 2)->default(0.0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pack_course');
    }
}