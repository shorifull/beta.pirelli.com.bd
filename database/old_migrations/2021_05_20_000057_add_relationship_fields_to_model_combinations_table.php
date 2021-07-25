<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToModelCombinationsTable extends Migration
{
    public function up()
    {
        Schema::table('model_combinations', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id', 'brand_fk_3837292')->references('id')->on('brands');
            $table->unsignedBigInteger('car_model_id')->nullable();
            $table->foreign('car_model_id', 'car_model_fk_3837293')->references('id')->on('car_models');
            $table->unsignedBigInteger('engine_id');
            $table->foreign('engine_id', 'engine_fk_3837295')->references('id')->on('engines');
            $table->unsignedBigInteger('chassis_id');
            $table->foreign('chassis_id', 'chassis_fk_3837296')->references('id')->on('chassis');
        });
    }
}
