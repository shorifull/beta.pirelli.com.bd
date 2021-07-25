<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTyresTable extends Migration
{
    public function up()
    {
        Schema::table('tyres', function (Blueprint $table) {
            $table->unsignedBigInteger('width_id')->nullable();
            $table->foreign('width_id', 'width_fk_3767025')->references('id')->on('widths');
            $table->unsignedBigInteger('ratio_id')->nullable();
            $table->foreign('ratio_id', 'ratio_fk_3767026')->references('id')->on('ratios');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id', 'size_fk_3767027')->references('id')->on('sizes');
        });
    }
}
