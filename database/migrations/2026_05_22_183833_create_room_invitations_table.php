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
        Schema::create('room_invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->index();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedBigInteger('invited_by_id')->index();
            $table->foreign('invited_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('inviting_id')->index();
            $table->foreign('inviting_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('status')->default(true);
            $table->boolean('accepted')->default(false);
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
        Schema::dropIfExists('room_invitations');
    }
};
