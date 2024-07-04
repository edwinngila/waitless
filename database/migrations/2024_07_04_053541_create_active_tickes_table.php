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
            $table->unsignedBigInteger('tickets_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_point_id');
            $table->timestamps();

            $table->foreign('tickets_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_point_id')->references('id')->on('service_points')->onDelete('cascade');
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
