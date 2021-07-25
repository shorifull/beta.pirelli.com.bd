<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_name');
            $table->string('page_slug')->nullable();
            $table->longText('page_content')->nullable();
            $table->string('active')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
