<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelCombinationTyrePivotTable extends Migration
{
    public function up()
    {
        Schema::create('model_combination_tyre', function (Blueprint $table) {
            $table->unsignedBigInteger('tyre_id');
            $table->foreign('tyre_id', 'tyre_id_fk_3837270')->references('id')->on('tyres')->onDelete('cascade');
            $table->unsignedBigInteger('model_combination_id');
            $table->foreign('model_combination_id', 'model_combination_id_fk_3837270')->references('id')->on('model_combinations')->onDelete('cascade');
        });
    }
}
