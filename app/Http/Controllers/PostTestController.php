<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PostTestController extends Controller
{
    public function PostTestCourse()
    {

        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'PostTests.SelectCourse',
            'Title'   => 'Select the course whose Post-Tests are to be managed',
            'Desc'    => 'Course Pre-Test Settings',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function CoursePostTestSelected(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('MgtPostTests', $id);

    }

    public function MgtPostTests($id)
    {

        $Courses = DB::table('courses')
            ->where('id', '=', $id)
            ->first();

        $PostTests = DB::table('post_tests')
            ->where('CID', '=', $Courses->CID)
            ->get();

        $rem = ['id', 'created_at', 'updated_at', 'ModulePresentation', 'uuid', 'CID', 'PostTestID', 'status'];

        $FormEngine = new FormEngine();
        $data       = [
            'Page'       => 'PostTests.MgtPostTests',
            'Title'      => 'Manage Post-Tests attached to the selected course',
            'Desc'       => $Courses->Course,
            'CourseName' => $Courses->Course,
            'CID'        => $Courses->CID,
            'PostTests'  => $PostTests,
            'rem'        => $rem,
            'Form'       => $FormEngine->Form('post_tests'),
        ];

        return view('scrn', $data);
    }

}