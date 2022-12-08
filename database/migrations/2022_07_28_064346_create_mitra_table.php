<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('event_slug')->unique();
            $table->integer('event_seq');
            $table->string('event_location');
            $table->dateTime('event_datetime');
            $table->longText('event_desc');
            $table->string('event_img');
            $table->string('event_syarat');
            $table->string('event_kategori');
            $table->boolean('is_active')->default(0);

            $table->timestamps();
            $table->blameable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitra');
    }
}
