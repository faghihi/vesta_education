<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTakepackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takepack', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pack_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('paid')->nullable();
            $table->string('discount_used')->nullable();
            $table->unique( array('user_id','pack_id') );
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
        Schema::dropIfExists('takepack');
    }
}