<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('designed_for')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->longText('gratitude')->nullable();
            $table->longText('wow')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('inspiration')->nullable();
            $table->longText('execution')->nullable();
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
        Schema::dropIfExists('books');
    }
}
