<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('News_id');
            $table->foreign('News_id')->references('id')->on('news')->onDelete('cascade');
            $table->string('VideoName');
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
        Schema::dropIfExists('news_videos');
    }
}
