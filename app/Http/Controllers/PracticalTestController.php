<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PracticalTestController extends Controller
{
    public function PracSelectTest()
    {

        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'PracticalTests.SelectCourse',
            'Title'   => 'Select the course whose Practical-Tests are to be managed',
            'Desc'    => 'Course Practical-Test Settings',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function PracTestSelected(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('PracTestSelectModule', $id);

    }

    public function PracTestSelectModule($id)
    {
        $Courses = DB::table('courses')->where('id', $id)->first();
        $Modules = DB::table('modules')->where('CID', $Courses->CID)->get();

        $data = [
            'Page'    => 'PracticalTests.SelectModule',
            'Title'   => 'Select Course Practical Tests are to be managed',
            'Desc'    => 'Practical Test Settings',
            'Modules' => $Modules,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function PracModuleSelected(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('MgtPracTest', $id);

    }

    public function MgtPracTest($id)
    {

        $Modules = DB::table('modules')
            ->where('id', '=', $id)
            ->first();

        $PracticalTests = DB::table('practical_tests')
            ->where('MID', '=', $Modules->MID)
            ->get();

        $SelectedCourse = DB::table('courses')
            ->where('CID', $Modules->CID)
            ->first();

        $rem = ['id', 'created_at', 'updated_at', 'ModulePresentation', 'uuid', 'CID', 'PracticalTestID', 'MID', 'enabled', 'status'];

        $FormEngine = new FormEngine();
        $data       = [
            'Page'           => 'PracticalTests.MgtPracTests',
            'Title'          => 'Manage Practical-Tests attached to the selected course',
            'Desc'           => $SelectedCourse->Course,
            'CourseName'     => $SelectedCourse->Course,
            'CID'            => $SelectedCourse->CID,
            'MID'            => $Modules->MID,
            'PracticalTests' => $PracticalTests,
            'rem'            => $rem,
            'Form'           => $FormEngine->Form('practical_tests'),
        ];

        return view('scrn', $data);
    }
}