<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PreTestController extends Controller
{
    public function PretTestCourse()
    {

        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'PreTests.SelectCourse',
            'Title'   => 'Select the course whose Pre-Tests are to be managed',
            'Desc'    => 'Course Pre-Test Settings',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function CoursePretestSelected(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('MgtPreTests', $id);

    }

    public function MgtPreTests($id)
    {

        $Courses = DB::table('courses')
            ->where('id', '=', $id)
            ->first();

        $PreTests = DB::table('pre_tests')
            ->where('CID', '=', $Courses->CID)
            ->get();

        $rem = ['id', 'created_at', 'updated_at', 'ModulePresentation', 'uuid', 'CID', 'PreTestID', 'status'];

        $FormEngine = new FormEngine();
        $data       = [
            'Page'       => 'PreTests.MgtPreTests',
            'Title'      => 'Manage Pre-Tests attached to the selected course',
            'Desc'       => $Courses->Course,
            'CourseName' => $Courses->Course,
            'CID'        => $Courses->CID,
            'PreTests'   => $PreTests,
            'rem'        => $rem,
            'Form'       => $FormEngine->Form('pre_tests'),
        ];

        return view('scrn', $data);
    }
}