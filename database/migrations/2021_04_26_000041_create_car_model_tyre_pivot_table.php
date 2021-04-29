<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelTyrePivotTable extends Migration
{
    public function up()
    {
        Schema::create('car_model_tyre', function (Blueprint $table) {
            $table->unsignedBigInteger('tyre_id');
            $table->foreign('tyre_id', 'tyre_id_fk_3767017')->references('id')->on('tyres')->onDelete('cascade');
            $table->unsignedBigInteger('car_model_id');
            $table->foreign('car_model_id', 'car_model_id_fk_3767017')->references('id')->on('car_models')->onDelete('cascade');
        });
    }
}
