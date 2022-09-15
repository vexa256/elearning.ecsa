<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class NotesMiniController extends Controller
{
    public function SelectCoursePresentations()
    {
        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'notes.SelectCoursePresent',
            'Title'   => 'Select Course For Resource Management',
            'Desc'    => "Course Presentations Settings",
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function AcceptCoursePresentation(Request $request)
    {

        $validated = $request->validate([
            '*' => 'required',
            // 'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('SelectPresentModule', ['id' => $id]);

    }

    public function SelectPresentModule($id)
    {
        $Courses = DB::table('courses')->where('id', $id)->first();
        $Modules = DB::table('modules')->where('CID', $Courses->CID)->get();

        $data = [
            'Page'    => 'notes.SelectPresentModule',
            'Title'   => 'Select Course Module For Presentation Notes Management',
            'Desc'    => 'Module Presentation Settings',
            'Modules' => $Modules,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function AdaptToMgtPresent(Request $request)
    {
        $validated = $request->validate([
            '*' => 'required',
            // 'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('MgtPresent', ['id' => $id]);

    }

    public function MgtPresent($id)
    {

        $Modules = DB::table('modules')->where('id', $id)->first();
        $Courses = DB::table('courses')->where('CID', $Modules->CID)->first();

        $Notes = DB::table('courses AS C')
            ->join('modules AS M', 'M.CID', 'C.CID')
            ->join('notes AS N', 'N.MID', 'M.MID')
            ->where('N.Type', 'present')
            ->where('N.MID', $Modules->MID)
            ->where('N.CID', $Modules->CID)
            ->select('N.*', 'C.Course', 'M.Module')
            ->get();

        $rem = ['id', 'created_at', 'updated_at', 'url', 'CoursePresentation', 'uuid', 'CID', 'MID', 'ModulePresentation', 'type'];

        $FormEngine = new FormEngine;

        $data = [
            'Page'       => 'notes.MgtPresent',
            'Title'      => 'Manage all presentations  attached to the selected course and module',
            'Desc'       => $Courses->Course,
            'Courses'    => $Courses,
            'CourseName' => $Courses->Course,
            'CID'        => $Courses->CID,
            'MID'        => $Modules->MID,
            'ModuleName' => $Modules->Module,
            "rem"        => $rem,
            "Notes"      => $Notes,
            "Form"       => $FormEngine->Form('notes'),
        ];

        return view('scrn', $data);
    }

}