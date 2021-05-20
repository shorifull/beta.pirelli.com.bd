<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMotoTyresTable extends Migration
{
    public function up()
    {
        Schema::table('moto_tyres', function (Blueprint $table) {
            $table->unsignedBigInteger('moto_brand_id');
            $table->foreign('moto_brand_id', 'moto_brand_fk_3950960')->references('id')->on('moto_brands');
            $table->unsignedBigInteger('moto_model_id');
            $table->foreign('moto_model_id', 'moto_model_fk_3950961')->references('id')->on('moto_models');
            $table->unsignedBigInteger('moto_engine_id');
            $table->foreign('moto_engine_id', 'moto_engine_fk_3950962')->references('id')->on('moto_engines');
            $table->unsignedBigInteger('moto_width_id')->nullable();
            $table->foreign('moto_width_id', 'moto_width_fk_3950963')->references('id')->on('moto_widths');
            $table->unsignedBigInteger('moto_size_id')->nullable();
            $table->foreign('moto_size_id', 'moto_size_fk_3950964')->references('id')->on('moto_sizes');
            $table->unsignedBigInteger('moto_ratio_id')->nullable();
            $table->foreign('moto_ratio_id', 'moto_ratio_fk_3950965')->references('id')->on('moto_ratios');
        });
    }
}
