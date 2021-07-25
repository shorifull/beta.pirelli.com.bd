<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodiesTable extends Migration
{
    public function up()
    {
        Schema::create('bodies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('body');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
