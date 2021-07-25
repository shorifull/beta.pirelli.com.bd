<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('car_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('button_label')->nullable();
            $table->string('button_url')->nullable();
            $table->string('activated')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
