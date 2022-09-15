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
        Schema::create('pre_tests', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('Title');
            $table->string('VeryBriefDescription');
            $table->string('CID');
            // $table->string('MID');
            $table->string('PreTestID');
            $table->string('status')->default('true');
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
        Schema::dropIfExists('pre_tests');
    }
};