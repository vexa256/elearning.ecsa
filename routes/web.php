<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\NotesMiniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::middleware(['auth'])->group(function () {

    require __DIR__ . '/ModularTests.php';
    require __DIR__ . '/PostTests.php';
    require __DIR__ . '/PreTests.php';
    require __DIR__ . '/ModExams.php';
    require __DIR__ . '/PreExams.php';
    require __DIR__ . '/PostExams.php';
    require __DIR__ . '/Student.php';
    require __DIR__ . '/Config.php';
    require __DIR__ . '/Practicals.php';

    Route::controller(NotesMiniController::class)->group(function () {

        Route::any('AdaptToMgtPresent', 'AdaptToMgtPresent')->name('AdaptToMgtPresent');

        Route::get('MgtPresent/{id}', 'MgtPresent')->name('MgtPresent');

        Route::get('SelectPresentModule/{id}', 'SelectPresentModule')->name('SelectPresentModule');

        Route::get('SelectCoursePresentations', 'SelectCoursePresentations')->name('SelectCoursePresentations');

        Route::any('AcceptCoursePresentation', 'AcceptCoursePresentation')->name('AcceptCoursePresentation');

    });
    Route::controller(NotesController::class)->group(function () {

        Route::post('AdaptToMgtVideoNotes', 'AdaptToMgtVideoNotes')->name('AdaptToMgtVideoNotes');

        Route::get('MgtCourseVideos/{id}', 'MgtCourseVideos')->name('MgtCourseVideos');

        Route::get('SelectModuleVideo/{id}', 'SelectModuleVideo')->name('SelectModuleVideo');

        Route::post('AcceptCourseVideo', 'AcceptCourseVideo')->name('AcceptCourseVideo');

        Route::get('SelectCourseVideo', 'SelectCourseVideo')->name('SelectCourseVideo');

        Route::get('DeleteDoc/{id}', 'DeleteDoc')->name('DeleteDoc');

        Route::post('AdaptToMgtNotes', 'AdaptToMgtNotes')->name('AdaptToMgtNotes');

        Route::any('SelectNotesModule/{id}', 'SelectNotesModule')->name('SelectNotesModule');

        Route::post('AcceptModuleNotesSelection', 'AcceptModuleNotesSelection')->name('AcceptModuleNotesSelection');

        Route::post('NewDoc', 'NewDoc')->name('NewDoc');

        Route::any('MgtCourseNotes/{id}', 'MgtCourseNotes')
            ->name('MgtCourseNotes');

        Route::any('AcceptCourseNotesSelection', 'AcceptCourseNotesSelection')->name('AcceptCourseNotesSelection');

        Route::any('SelectCourseNotes', 'SelectCourseNotes')->name('SelectCourseNotes');

    });

    Route::controller(CourseController::class)->group(function () {

        Route::any('MgtModules/{id}', 'MgtModules')->name('MgtModules');

        Route::any('CourseSelectedForModuleSettings', 'CourseSelectedForModuleSettings')->name('CourseSelectedForModuleSettings');

        Route::any('SelectCourseModule', 'SelectCourseModule')->name('SelectCourseModule');

        Route::post('SaveNewCourse', 'SaveNewCourse')->name('SaveNewCourse');

        Route::get('MgtCourses', 'MgtCourses')->name('MgtCourses');

        Route::get('ManageInstitutions', 'ManageInstitutions')->name('ManageInstitutions');

    });

    Route::controller(MainController::class)->group(function () {

        Route::any('console', 'console')->name('console');
        Route::any('/', 'CloudConsole')->name('CloudConsole');
        Route::any('/CloudConsole', 'CloudConsole')->name('home');
        Route::any('dashboard', 'console')->name('dashboard');

    });

    Route::controller(CrudController::class)->group(function () {

        Route::get('DeleteDataWeb/{id}/{TableName}', 'DeleteDataWeb')->name('DeleteDataWeb');

        Route::get('DeleteData/{id}/{TableName}', 'DeleteData')->name('DeleteData');

        Route::post('MassUpdate', 'MassUpdate')->name('MassUpdate');

        Route::post('MassInsert', 'MassInsert')->name('MassInsert');
    });
});
require __DIR__ . '/auth.php';