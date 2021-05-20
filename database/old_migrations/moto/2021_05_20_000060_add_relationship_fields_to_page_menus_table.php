<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPageMenusTable extends Migration
{
    public function up()
    {
        Schema::table('page_menus', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id', 'page_fk_3774011')->references('id')->on('pages');
        });
    }
}
