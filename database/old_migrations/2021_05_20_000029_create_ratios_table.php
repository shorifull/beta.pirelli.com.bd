<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatiosTable extends Migration
{
    public function up()
    {
        Schema::create('ratios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ratio');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
