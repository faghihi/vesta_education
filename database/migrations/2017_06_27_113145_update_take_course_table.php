<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTakeCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('takecourse', function (Blueprint $table) {
            $table->string('QRCodeData')->default('0');
            $table->string('QRCodeFile')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('takecourse', function (Blueprint $table) {
            $table->dropColumn('QRCodeData');
            $table->dropColumn('QRCodeFile');
        });
    }
}
