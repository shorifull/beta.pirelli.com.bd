<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRetailersTable extends Migration
{
    public function up()
    {
        Schema::table('retailers', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_type_id');
            $table->foreign('vehicle_type_id', 'vehicle_type_fk_3767075')->references('id')->on('vehicle_types');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id', 'city_fk_3767077')->references('id')->on('cities');
        });
    }
}
