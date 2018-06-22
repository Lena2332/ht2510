<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 180)->unique();
            $table->string('title', 255)->nullable();
            $table->string('img', 255)->nullable();
            $table->text('video')->nullable();
            $table->text('annotation')->nullable();
            $table->text('text')->nullable();
            $table->integer('user_id')->default(1);
            $table->string('option',255)->nullable();
            $table->string('smm_title', 255)->nullable();
            $table->text('smm_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
