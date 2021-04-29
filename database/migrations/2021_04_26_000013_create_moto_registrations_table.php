<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotoRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('moto_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('zip');
            $table->string('address')->nullable();
            $table->date('date_purchased');
            $table->string('invoice_number');
            $table->string('product_dot')->nullable();
            $table->integer('product_quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
