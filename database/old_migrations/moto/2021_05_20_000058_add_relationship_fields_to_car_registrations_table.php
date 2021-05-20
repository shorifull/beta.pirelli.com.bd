<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::table('car_registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id', 'city_fk_3773438')->references('id')->on('cities');
            $table->unsignedBigInteger('product_name_id');
            $table->foreign('product_name_id', 'product_name_fk_3773444')->references('id')->on('products');
            $table->unsignedBigInteger('product_size_id');
            $table->foreign('product_size_id', 'product_size_fk_3773445')->references('id')->on('product_sizes');
            $table->unsignedBigInteger('retailer_id')->nullable();
            $table->foreign('retailer_id', 'retailer_fk_3773449')->references('id')->on('retailers');
        });
    }
}
