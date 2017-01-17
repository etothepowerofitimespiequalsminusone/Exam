<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('artist');
            $table->date('released')->nullable();
            $table->string('albumUrl')->nullable();
            $table->tinyInteger('leaked')->default(0);
            $table->string('genre')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->unique(['title','artist']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
