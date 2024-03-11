<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityIdToWarrantyClaims extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warranty_claims', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('city_id')->nullable();
            // add relation to city table
            $table->foreign('city_id', 'city_fk_4963603')->references('id')->on('cities');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['city_id']);
            // Drop the city_id column
            $table->dropColumn('city_id');
        });

    }
}
