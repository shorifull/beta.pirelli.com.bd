<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTyresTable extends Migration
{
    public function up()
    {
        Schema::create('tyres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->longText('features')->nullable();
            $table->longText('specifications')->nullable();
            $table->longText('warranty')->nullable();
            $table->longText('video')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
