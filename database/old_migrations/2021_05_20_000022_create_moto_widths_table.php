<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotoWidthsTable extends Migration
{
    public function up()
    {
        Schema::create('moto_widths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('width');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
