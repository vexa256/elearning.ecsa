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
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->id();
            $table->string('CID');
            $table->string('MID')->nullable();
            $table->string('TestID');
            $table->string('TestType');
            $table->string('QtnID');
            $table->text('Question');
            $table->integer('QuestionOptionOne')->default(100);
            $table->integer('QuestionOptionTwo')->default(200);
            $table->integer('QuestionOptionThree')->default(300);
            $table->integer('QuestionOptionFour')->default(400);
            $table->integer('CorrectAnswerOption')->default(0);
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
        Schema::dropIfExists('exam_questions');
    }
};