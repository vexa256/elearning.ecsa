<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PracticalQuestionsController extends Controller
{
    public function PracQtnTestCourse()
    {

        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'PracQtns.SelectCourse',
            'Title'   => 'Select the course whose practical test questions are to be managed',
            'Desc'    => 'Course Practical-Test Question Banks',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function CoursePracQtnSelected(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('PracQtnTestsMod', $id);

    }

    public function PracQtnTestsMod($id)
    {
        $Courses = DB::table('courses')->where('id', $id)->first();
        $Modules = DB::table('modules')->where('CID', $Courses->CID)->get();

        $data = [
            'Page'    => 'PracQtns.SelectModule',
            'Title'   => 'Select Course Module whose test questions are to be managed',
            'Desc'    => 'Practical Test Question Banks',
            'Modules' => $Modules,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function PracQtnTestAdapt(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('PracQtnSelectTest', $id);

    }

    public function PracQtnTemplate($id)
    {
        $Modules        = DB::table('modules')->where('id', $id)->first();
        $PracticalTests = DB::table('practical_tests')
            ->where('MID', $Modules->MID)
            ->get();

        $data = [
            'Page'           => 'PracQtns.SelectTest',
            'Title'          => 'Select Practical Test Template To Attach Question Bank To',
            'Desc'           => 'Practical Test Question Banks',
            'PracticalTests' => $PracticalTests,

        ];

        return view('scrn', $data);

    }

    public function GoToManagePracQtns(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('PracQtnSelectTest', $id);

    }

    public function PracQtnSelectTest($id)
    {

        $PracticalTests = DB::table('practical_tests')
            ->where('id', $id)
            ->first();

        $Modules = DB::table('modules')
            ->where('MID', '=', $PracticalTests->MID)
            ->first();

        $SelectedCourse = DB::table('courses')
            ->where('CID', $Modules->CID)
            ->first();

        $PracQtns = DB::table('exam_questions')
            ->where('MID', '=', $Modules->MID)
            ->where('CID', '=', $Modules->CID)
            ->where('TestID', '=', $PracticalTests->PracticalTestID)
            ->get();

        $rem = ['id', 'created_at', 'updated_at', 'ModulePresentation', 'uuid', 'CID', 'PracQtnTestID', 'MID', 'enabled', 'status'];

        $FormEngine = new FormEngine();
        $data       = [
            'Page'       => 'PracQtnTests.MgtPracQtn',
            'Title'      => 'Manage Practical-Test questions attached to the selected course',
            'Desc'       => $SelectedCourse->Course,
            'CourseName' => $SelectedCourse->Course,
            'CID'        => $SelectedCourse->CID,
            'MID'        => $Modules->MID,
            'PracQtns'   => $PracQtns,
            'rem'        => $rem,
            'Form'       => $FormEngine->Form('exam_questions'),
        ];

        return view('scrn', $data);
    }
}