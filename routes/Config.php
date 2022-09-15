<?php

use App\Http\Controllers\ConfigController;

Route::controller(ConfigController::class)->group(function () {
    Route::post('NewSchedule', 'NewSchedule')
        ->name('NewSchedule');

    Route::get('ExamTimerSettings', 'ExamTimerSettings')
        ->name('ExamTimerSettings');
});