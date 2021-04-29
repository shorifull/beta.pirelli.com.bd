<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductSizesTable extends Migration
{
    public function up()
    {
        Schema::table('product_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_3767065')->references('id')->on('products');
        });
    }
}
