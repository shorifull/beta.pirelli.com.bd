<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChassisTable extends Migration
{
    public function up()
    {
        Schema::create('chassis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chassis');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
