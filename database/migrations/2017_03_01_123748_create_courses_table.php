<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('level');
            $table->string('introvideo')->nullable();
            $table->text('introduction')->nullable();
            $table->text('goal')->nullable();
            $table->text('condition')->nullable();
            $table->text('requirement')->nullable();
            $table->text('qualification')->nullable();
            $table->integer('category_id')->unsigned()->index();
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
        Schema::table('courses', function($table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('courses');
    }
}