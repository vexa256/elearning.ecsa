<?php

use App\Http\Controllers\StudentController;

Route::controller(StudentController::class)->group(function () {

    Route::get('Explore/{id}', 'Explore')->name('Explore');

    Route::post('NewStudent', 'NewStudent')->name('NewStudent');

    Route::get('StudentCourses', 'StudentCourses')->name('StudentCourses');
});