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
        Schema::create('service_points', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('service_id');
            $table->string('service_point_name');
            $table->boolean('service_point_status')->default(false);
            $table->timestamps();


            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_points');
    }
};
