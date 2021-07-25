<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailersTable extends Migration
{
    public function up()
    {
        Schema::create('retailers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shop_name');
            $table->longText('description')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('active')->default(0);
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
