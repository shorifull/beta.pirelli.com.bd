<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnginesTable extends Migration
{
    public function up()
    {
        Schema::create('engines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('engine');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
