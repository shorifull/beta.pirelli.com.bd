<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotoSizesTable extends Migration
{
    public function up()
    {
        Schema::create('moto_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('size');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
