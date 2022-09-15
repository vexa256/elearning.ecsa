<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ModularTestController extends Controller
{
    public function ModularTestCourse()
    {

        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'ModularTests.SelectCourse',
            'Title'   => 'Select the course whose Pre-Tests are to be managed',
            'Desc'    => 'Course Pre-Test Settings',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function CourseModularSelected(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('ModularTestsMod', $id);

    }

    public function ModularTestsMod($id)
    {
        $Courses = DB::table('courses')->where('id', $id)->first();
        $Modules = DB::table('modules')->where('CID', $Courses->CID)->get();

        $data = [
            'Page'    => 'ModularTests.SelectModule',
            'Title'   => 'Select Course Modular Tests are to be managed',
            'Desc'    => 'Modular Test Settings',
            'Modules' => $Modules,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function ModularTestAdapt(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('MgtModularTest', $id);

    }

    public function MgtModularTest($id)
    {

        $Modules = DB::table('modules')
            ->where('id', '=', $id)
            ->first();

        $ModularTests = DB::table('modular_tests')
            ->where('MID', '=', $Modules->MID)
            ->get();

        $SelectedCourse = DB::table('courses')
            ->where('CID', $Modules->CID)
            ->first();

        $rem = ['id', 'created_at', 'updated_at', 'ModulePresentation', 'uuid', 'CID', 'ModularTestID', 'MID', 'enabled', 'status'];

        $FormEngine = new FormEngine();
        $data       = [
            'Page'         => 'ModularTests.MgtModular',
            'Title'        => 'Manage Modular-Tests attached to the selected course',
            'Desc'         => $SelectedCourse->Course,
            'CourseName'   => $SelectedCourse->Course,
            'CID'          => $SelectedCourse->CID,
            'MID'          => $Modules->MID,
            'ModularTests' => $ModularTests,
            'rem'          => $rem,
            'Form'         => $FormEngine->Form('modular_tests'),
        ];

        return view('scrn', $data);
    }
}