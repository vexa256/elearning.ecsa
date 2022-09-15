<?php

use App\Http\Controllers\PreTestController;

Route::controller(PreTestController::class)->group(function () {

    Route::get('MgtPreTests/{id}', 'MgtPreTests')->name('MgtPreTests');

    Route::get('PretTestCourse', 'PretTestCourse')->name('PretTestCourse');

    Route::post('CoursePretestSelected', 'CoursePretestSelected')->name('CoursePretestSelected');

});