<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotoEnginesTable extends Migration
{
    public function up()
    {
        Schema::create('moto_engines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('engine');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
