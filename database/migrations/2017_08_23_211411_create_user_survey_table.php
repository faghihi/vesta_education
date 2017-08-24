<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_survey', function (Blueprint $table) {
            $table->increments('id');
            $table->text('answer')->nullable();;
            $table->integer('user_id')->unsigned();
            $table->integer('survey_id')->unsigned();
            # Rate items
            $table->double('rate', 15, 2)->nullable();
            $table->string('item')->nullable();
            //$table->datetime('time');
            $table->timestamps();
            /*
             * If you soft delete
             * something it is still there so it's able to be
             * recovered (un-deleted) Hard delete,
             * or permanent delete, deletes it
             * off your database for good.
             * So you would not be able
             * to get that post back !
             * unless you had a backup
             */
            $table->softDeletes();
            $table->index(['deleted_at']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_survey');
    }
}