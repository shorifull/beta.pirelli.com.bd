<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelCombinationYearPivotTable extends Migration
{
    public function up()
    {
        Schema::create('model_combination_year', function (Blueprint $table) {
            $table->unsignedBigInteger('model_combination_id');
            $table->foreign('model_combination_id', 'model_combination_id_fk_3837294')->references('id')->on('model_combinations')->onDelete('cascade');
            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id', 'year_id_fk_3837294')->references('id')->on('years')->onDelete('cascade');
        });
    }
}
