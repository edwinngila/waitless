<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('active_tickes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_point_id');
            $table->string('audio_file');
            $table->unsignedBigInteger('cancelled');
            $table->unsignedBigInteger('completed');
            $table->timestamps();

            // $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('service_point_id')->references('id')->on('service_points')->onDelete('cascade');
            // $table->foreign('audio_id')->references('id')->on('audio_files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('active_tickes');
    }
};
