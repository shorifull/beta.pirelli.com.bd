<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotoTyresTable extends Migration
{
    public function up()
    {
        Schema::create('moto_tyres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
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
