<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTakePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('takepack', function (Blueprint $table) {
            $table->string('QRCodeData');
            $table->string('QRCodeFile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('takepack', function (Blueprint $table) {
            $table->dropColumn('QRCodeData');
            $table->dropColumn('QRCodeFile');
        });
    }
}
