<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 180)->unique();
            $table->string('title', 255)->nullable();
            $table->string('img', 255)->nullable();
            $table->text('text')->nullable();
            $table->enum('level',[1,2,3,4,5])->default(1);
            $table->integer('parent_category_id')->default(0);
            $table->string('option',255)->nullable();
            $table->integer('user_id')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
