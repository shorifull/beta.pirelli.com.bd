<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryMotoTyrePivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_moto_tyre', function (Blueprint $table) {
            $table->unsignedBigInteger('moto_tyre_id');
            $table->foreign('moto_tyre_id', 'moto_tyre_id_fk_3950966')->references('id')->on('moto_tyres')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_id_fk_3950966')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
