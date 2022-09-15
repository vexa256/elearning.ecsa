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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->default('Incomplete');
            $table->string('phone')->nullable();
            $table->string('Nationality')->nullable();
            $table->string('Institution')->nullable();
            $table->text('ApplicationLetter')->nullable();
            $table->string('ParentInstitution')->nullable();
            $table->string('WorkPhoneNumber')->nullable();
            $table->string('PersonalPhoneNumber')->nullable();
            $table->string('PermanentAddress')->nullable();
            $table->string('HighestLevelOfEducation')->nullable();
            $table->string('UserID')->nullable();
            $table->string('Profession')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        \DB::unprepared(USER_DATA);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};