<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidthsTable extends Migration
{
    public function up()
    {
        Schema::create('widths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('width');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
