<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PostTestExamController extends Controller
{
    public function PostExamCourse()
    {
        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'PostExams.SelectCourse',
            'Title'   => 'Select course to attach Post-test questions to',
            'Desc'    => 'Post-Test  Questions Settings',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function PostExamCourseSelected(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('SelectPostTest', $id);
    }

    public function SelectPostTest($id)
    {

        $Cos       = DB::table('courses')->where('id', $id)->first();
        $PostTests = DB::table('post_tests')->where('CID', $Cos->CID)->get();

        $data = [
            'Page'    => 'PostExams.SelectTest',
            'Title'   => 'Select Post-Test  to attach  questions to',
            'Desc'    => 'Post-Test  Questions Settings',
            'Courses' => $PostTests,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function PostTestSelected(Request $request)
    {
        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('MgtPostExamQuestion', $id);
    }

    public function MgtPostExamQuestion($id)
    {

        $PostTests = DB::table('post_tests')->where('id', $id)->first();

        $Questions = DB::table('exam_questions')
            ->where('CID', '=', $PostTests->CID)
            ->where('TestType', '=', 'PostTest')
            ->get();

        $Course = DB::table('courses')
            ->where('CID', '=', $PostTests->CID)
            ->first();

        $rem = ['id', 'created_at', 'updated_at', 'QuestionOptionOne', 'QuestionOptionFour', 'QuestionOptionThree', 'QuestionOptionTwo', 'uuid', 'CID', 'TestID', 'QtnID', 'MID', 'TestType'];

        $FormEngine = new FormEngine();
        $data       = [
            'Page'       => 'PostExams.PostExams',
            'Title'      => 'Manage Questions attached to the selected Post-Test',
            'Desc'       => $Course->Course,
            'CourseName' => $Course->Course,
            'PostTests'  => $PostTests->Title,
            'CID'        => $Course->CID,
            'TestID'     => $PostTests->PostTestID,
            'Questions'  => $Questions,
            'rem'        => $rem,
            'id'         => $id,
            'Form'       => $FormEngine->Form('exam_questions'),
        ];

        return view('scrn', $data);
    }

    public function AjaxMgtPosttests($id)
    {

        $PostTests = DB::table('Post_tests')->where('id', $id)->first();

        $Questions = DB::table('exam_questions')
            ->where('CID', '=', $PostTests->CID)
            ->get();

        $Course = DB::table('courses')
            ->where('CID', '=', $PostTests->CID)
            ->first();

        $rem = ['id', 'created_at', 'updated_at', 'ModulePostsentation', 'uuid', 'CID', 'TestID', 'QtnID', 'MID', 'TestType'];

        $FormEngine = new FormEngine();
        $data       = [
            'Page'       => 'PostExams.PostExams',
            'Title'      => 'Manage Questions attached to the selected Post-Test',
            'Desc'       => $Course->Course,
            'CourseName' => $Course->Course,
            'PostTests'  => $PostTests->Title,
            'TestID'     => $PostTests->PostTestID,
            'CID'        => $Course->CID,
            'Questions'  => $Questions,
            'rem'        => $rem,
            'id'         => $id,
            'Form'       => $FormEngine->Form('exam_questions'),
        ];

        return view('PostExams.PostExams', $data)->render();
    }

}