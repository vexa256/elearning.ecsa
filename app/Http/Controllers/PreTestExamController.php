<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PreTestExamController extends Controller
{
    public function PreExamCourse()
    {
        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'PreExams.SelectCourse',
            'Title'   => 'Select course to attach pre-test questions to',
            'Desc'    => 'Pre-Test  Questions Settings',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function PreExamCourseSelected(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('SelectPreTest', $id);
    }

    public function SelectPreTest($id)
    {

        $Cos      = DB::table('courses')->where('id', $id)->first();
        $PreTests = DB::table('pre_tests')->where('CID', $Cos->CID)->get();

        $data = [
            'Page'    => 'PreExams.SelectTest',
            'Title'   => 'Select Pre-Test  to attach  questions to',
            'Desc'    => 'Pre-Test  Questions Settings',
            'Courses' => $PreTests,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function PreTestSelected(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('MgtPreExamQuestion', $id);
    }

    public function MgtPreExamQuestion($id)
    {

        $PreTests = DB::table('pre_tests')->where('id', $id)->first();

        $Questions = DB::table('exam_questions')
            ->where('CID', '=', $PreTests->CID)
            ->where('TestType', '=', 'PreTest')
            ->get();

        $Course = DB::table('courses')
            ->where('CID', '=', $PreTests->CID)
            ->first();

        $rem = ['id', 'created_at', 'updated_at', 'QuestionOptionOne', 'QuestionOptionFour', 'QuestionOptionThree', 'QuestionOptionTwo', 'uuid', 'CID', 'TestID', 'QtnID', 'MID', 'TestType'];

        $FormEngine = new FormEngine();
        $data       = [
            'Page'       => 'PreExams.PreExams',
            'Title'      => 'Manage Questions attached to the selected Pre-Test',
            'Desc'       => $Course->Course,
            'CourseName' => $Course->Course,
            'PreTests'   => $PreTests->Title,
            'CID'        => $Course->CID,
            'TestID'     => $PreTests->PreTestID,
            'Questions'  => $Questions,
            'rem'        => $rem,
            'id'         => $id,
            'Form'       => $FormEngine->Form('exam_questions'),
        ];

        return view('scrn', $data);
    }

    public function AjaxMgtPretests($id)
    {

        $PreTests = DB::table('pre_tests')->where('id', $id)->first();

        $Questions = DB::table('exam_questions')
            ->where('CID', '=', $PreTests->CID)
            ->get();

        $Course = DB::table('courses')
            ->where('CID', '=', $PreTests->CID)
            ->first();

        $rem = ['id', 'created_at', 'updated_at', 'ModulePresentation', 'uuid', 'CID', 'TestID', 'QtnID', 'MID', 'TestType'];

        $FormEngine = new FormEngine();
        $data       = [
            'Page'       => 'PreExams.PreExams',
            'Title'      => 'Manage Questions attached to the selected Pre-Test',
            'Desc'       => $Course->Course,
            'CourseName' => $Course->Course,
            'PreTests'   => $PreTests->Title,
            'TestID'     => $PreTests->PreTestID,
            'CID'        => $Course->CID,
            'Questions'  => $Questions,
            'rem'        => $rem,
            'id'         => $id,
            'Form'       => $FormEngine->Form('exam_questions'),
        ];

        return view('PreExams.PreExams', $data)->render();
    }

}