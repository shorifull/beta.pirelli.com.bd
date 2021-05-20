<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageMenusTable extends Migration
{
    public function up()
    {
        Schema::create('page_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
