<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWarrantyClaimsTable extends Migration
{
    public function up()
    {
        Schema::table('warranty_claims', function (Blueprint $table) {
            $table->unsignedBigInteger('product_name_id');
            $table->foreign('product_name_id', 'product_name_fk_3767124')->references('id')->on('products');
            $table->unsignedBigInteger('product_size_id');
            $table->foreign('product_size_id', 'product_size_fk_3767125')->references('id')->on('product_sizes');
            $table->unsignedBigInteger('retailer_id')->nullable();
            $table->foreign('retailer_id', 'retailer_fk_3767127')->references('id')->on('retailers');
        });
    }
}
