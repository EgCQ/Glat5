<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_notices', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('favorite');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_notice');
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_notice')->references('id')->on('notices');
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
        Schema::dropIfExists('comment_notices');
    }
};
