<?php

namespace App\Http\Controllers;

use DB;

class ModTestExamController extends Controller
{
    public function ModExamCourse()
    {

        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'ModExams.SelectCourse',
            'Title'   => 'Select the course whose modular test questions are to be managed',
            'Desc'    => 'Course Modular Test Questions',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function AcceptModCourse(Request $request)
    {
        $validated = $request->validate([
            '*' => 'required',
        ]);

        $id = $request->id;

        return redirect()->route('MgtModularTest', $id);
    }

    // public function ModExamCourse()
    // {
    //     $Courses = DB::table('courses')->where('id', $id)->first();
    //     $Modules = DB::table('modules')->where('CID', $Courses->CID)->get();

    //     $data = [
    //         'Page'    => 'notes.SelectModule',
    //         'Title'   => 'Select Course Module To Attach',
    //         'Desc'    => 'Module Notes Settings',
    //         'Modules' => $Modules,
    //         // "rem" => $rem,
    //         // "Form" => $FormEngine->Form('courses'),
    //     ];

    //     return view('scrn', $data);
    // }
}