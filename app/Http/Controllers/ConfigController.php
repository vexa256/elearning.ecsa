<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormEngine;
use DB;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function ExamTimerSettings()
    {

        $Courses    = DB::table('courses')->get();
        $FormEngine = new FormEngine;
        $Exams      = DB::table('exam_timers AS E')
            ->join('courses AS C', 'C.CID', 'E.CID')
            ->select('C.Course', 'E.*')
            ->get();

        $rem = ['id', 'status', 'MID', 'TestType', 'IID', 'created_at', 'updated_at', 'uuid', 'CID'];

        $data = [
            'Page'    => 'Scheduler.MgtSchedule',
            'Title'   => 'Exam Schedule Settings',
            'Desc'    => 'Set exam schedule and mode',
            'Exams'   => $Exams,
            'Courses' => $Courses,
            "rem"     => $rem,
            "Form"    => $FormEngine->Form('exam_timers'),
        ];

        return view('scrn', $data);
    }

    public function NewDuration(Request $request)
    {
        $validated = $this->validate($request, [
            '*'     => 'required',
            'files' => 'nullable',

        ]);

        $counter = DB::table($request->TableName)
            ->where('CID', $request->CID)
            ->where('TestType', $request->TestType)
            ->count();

        if ($counter > 0) {

            return redirect()->back()->with('error_a', "The selected course's test type has a duration. Try again with a different test type or course.");
        }

        DB::table($request->TableName)->insert(
            $request->except(['_token', 'TableName', 'id', 'files'])
        );

        return redirect()->back()->with('status', "A new test duration was created successfully for the selected course");

    }
    public function NewSchedule(Request $request)
    {

        $validated = $this->validate($request, [
            '*'     => 'required',
            'files' => 'nullable',

        ]);

        $counter = DB::table($request->TableName)
            ->where('CID', $request->CID)
            ->where('TestType', $request->TestType)
            ->count();

        if ($counter > 0) {

            return redirect()->back()->with('error_a', "The selected course's test type has a schedule. Try again with a different test type or course.");
        }

        DB::table($request->TableName)->insert(
            $request->except(['_token', 'TableName', 'id', 'files'])
        );

        return redirect()->back()->with('status', "A new test schedule was created successfully for the selected course");

    }

    public function MgtExamDuration()
    {
        $Courses    = DB::table('courses')->get();
        $FormEngine = new FormEngine;
        $Duration   = DB::table('exam_durations AS E')
            ->join('courses AS C', 'C.CID', 'E.CID')
            ->select('C.Course', 'E.*')
            ->get();

        $rem = ['id', 'status', 'MID', 'TestType', 'IID', 'created_at', 'updated_at', 'uuid', 'CID'];

        $data = [
            'Page'     => 'Scheduler.TestDuration',
            'Title'    => 'Exam Duration Settings',
            'Desc'     => 'Set duration for tests',
            'Duration' => $Duration,
            'Courses'  => $Courses,
            "rem"      => $rem,
            "Form"     => $FormEngine->Form('exam_durations'),
        ];

        return view('scrn', $data);
    }
}