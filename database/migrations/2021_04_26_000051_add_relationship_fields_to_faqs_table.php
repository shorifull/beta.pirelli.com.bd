<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFaqsTable extends Migration
{
    public function up()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->unsignedBigInteger('faq_category_id');
            $table->foreign('faq_category_id', 'faq_category_fk_3767047')->references('id')->on('faq_categories');
        });
    }
}
