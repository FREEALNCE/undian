<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('class_name');
            $table->integer('class_seq');
            $table->string('class_slug')->unique();
            $table->longText('class_desc');
            $table->string('class_img');
            $table->string('class_syarat');
            $table->string('class_age');
            $table->string('class_price');
            $table->string('meta_name');
            $table->string('meta_keyword');
            $table->string('meta_desc');
            $table->boolean('is_active')->default(0);
            $table->timestamps();
            $table->blameable();

            $table->foreign('category_id')->references('id')->on('categories_class')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}