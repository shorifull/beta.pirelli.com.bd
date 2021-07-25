<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotoModelsTable extends Migration
{
    public function up()
    {
        Schema::create('moto_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
