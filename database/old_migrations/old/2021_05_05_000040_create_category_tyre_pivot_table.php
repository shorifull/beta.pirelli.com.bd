<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTyrePivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_tyre', function (Blueprint $table) {
            $table->unsignedBigInteger('tyre_id');
            $table->foreign('tyre_id', 'tyre_id_fk_3767019')->references('id')->on('tyres')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_id_fk_3767019')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
