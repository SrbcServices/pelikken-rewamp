<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontentcontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontentcontacts', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
            $table->string('Subject');
            $table->string('Email');
            $table->string('PhoneNumber');
            $table->text('Message');
            $table->integer('Status');
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
        Schema::dropIfExists('frontentcontacts');
    }
}
