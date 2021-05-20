<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantyClaimsTable extends Migration
{
    public function up()
    {
        Schema::create('warranty_claims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
