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
        Schema::create('exam_durations', function (Blueprint $table) {
            $table->id();
            $table->string('CID');
            $table->string('TestType');
            $table->string('status')->default('false');
            $table->integer('TestDurationInMinutes')->default('60');
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
        Schema::dropIfExists('exam_durations');
    }
};