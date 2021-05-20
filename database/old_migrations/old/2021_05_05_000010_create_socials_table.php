<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration
{
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('you_tube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tumblr')->nullable();
            $table->string('flickr')->nullable();
            $table->string('reddit')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('whats_app')->nullable();
            $table->string('quora')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
