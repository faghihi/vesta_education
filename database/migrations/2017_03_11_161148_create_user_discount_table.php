<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_discount', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('code')->unique();
            $table->integer('disable')->default('1');
            $table->integer('type')->default('0');
            $table->integer('value')->default('0');
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
        Schema::table('user_discount', function($table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('user_discount');
    }
}