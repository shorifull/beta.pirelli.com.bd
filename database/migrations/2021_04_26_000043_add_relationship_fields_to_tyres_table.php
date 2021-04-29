<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTyresTable extends Migration
{
    public function up()
    {
        Schema::table('tyres', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id', 'brand_fk_3767016')->references('id')->on('brands');
            $table->unsignedBigInteger('body_id')->nullable();
            $table->foreign('body_id', 'body_fk_3767018')->references('id')->on('bodies');
            $table->unsignedBigInteger('fuel_id')->nullable();
            $table->foreign('fuel_id', 'fuel_fk_3767020')->references('id')->on('fuels');
            $table->unsignedBigInteger('transmission_id')->nullable();
            $table->foreign('transmission_id', 'transmission_fk_3767021')->references('id')->on('transmissions');
            $table->unsignedBigInteger('engine_id')->nullable();
            $table->foreign('engine_id', 'engine_fk_3767022')->references('id')->on('engines');
            $table->unsignedBigInteger('chassis_id')->nullable();
            $table->foreign('chassis_id', 'chassis_fk_3767023')->references('id')->on('chassis');
            $table->unsignedBigInteger('year_id')->nullable();
            $table->foreign('year_id', 'year_fk_3767024')->references('id')->on('years');
            $table->unsignedBigInteger('width_id')->nullable();
            $table->foreign('width_id', 'width_fk_3767025')->references('id')->on('widths');
            $table->unsignedBigInteger('ratio_id')->nullable();
            $table->foreign('ratio_id', 'ratio_fk_3767026')->references('id')->on('ratios');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id', 'size_fk_3767027')->references('id')->on('sizes');
        });
    }
}
