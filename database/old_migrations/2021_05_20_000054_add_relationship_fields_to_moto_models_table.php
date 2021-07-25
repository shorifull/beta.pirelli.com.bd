<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMotoModelsTable extends Migration
{
    public function up()
    {
        Schema::table('moto_models', function (Blueprint $table) {
            $table->unsignedBigInteger('moto_brand_id');
            $table->foreign('moto_brand_id', 'moto_brand_fk_3950776')->references('id')->on('moto_brands');
        });
    }
}
