<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('footer_about_us')->nullable();
            $table->string('footer_copyright')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
