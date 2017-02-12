<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDimensionToOmiInformasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('omi_informasi', function (Blueprint $table) {
            $table->integer('imageWidth');
            $table->integer('imageHeight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('omi_informasi', function (Blueprint $table) {
            $table->dropColumn(['imageWidth', 'imageHeight']);
        });
    }
}
