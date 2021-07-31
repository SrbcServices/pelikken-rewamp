<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->text('NewsHeading');
            $table->text('SubHeading');
            $table->unsignedBigInteger('Source');
            $table->unsignedBigInteger('Condinent')->nullable();
            $table->unsignedBigInteger('Country')->nullable();
            $table->unsignedBigInteger('Category');
            $table->unsignedBigInteger('SubCategory')->nullable();
            $table->string('Featured')->nullable();
            $table->string('Highlight')->nullable();
            $table->string('Trending')->nullable();
            $table->string('ThumbImage')->nullable();
            $table->longText('NewsDiscription');
            $table->foreign('Source')->references('id')->on('sources')->onDelete('cascade');
            $table->foreign('Condinent')->references('id')->on('condinents')->onDelete('cascade');
            $table->foreign('Country')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('Category')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('SubCategory')->references('id')->on('sub_categories')->onDelete('cascade')->nullable();
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('news');
    }
}
