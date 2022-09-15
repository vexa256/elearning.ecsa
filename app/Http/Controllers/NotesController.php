<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class NotesController extends Controller
{

    public function SelectCourseNotes()
    {
        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'notes.SelectCourseNotes',
            'Title'   => 'Select The Course Whose Notes Are To Be Managed',
            'Desc'    => 'Course Notes Settings',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function AcceptCourseNotesSelection(Request $request)
    {

        $validated = $request->validate([
            '*' => 'required',
            // 'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('SelectNotesModule', ['id' => $id]);

    }

    public function SelectNotesModule($id)
    {
        $Courses = DB::table('courses')->where('id', $id)->first();
        $Modules = DB::table('modules')->where('CID', $Courses->CID)->get();

        $data = [
            'Page'    => 'notes.SelectModule',
            'Title'   => 'Select Course Module Whose Notes Are To Be Managed',
            'Desc'    => 'Module Notes Settings',
            'Modules' => $Modules,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }
    public function AdaptToMgtNotes(Request $request)
    {
        $validated = $request->validate([
            '*' => 'required',
            // 'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('MgtCourseNotes', ['id' => $id]);

    }
    public function MgtCourseNotes($id)
    {

        $Modules = DB::table('modules')->where('id', $id)->first();
        $Courses = DB::table('courses')->where('CID', $Modules->CID)->first();

        $Notes = DB::table('courses AS C')
            ->join('modules AS M', 'M.CID', 'C.CID')
            ->join('notes AS N', 'N.MID', 'M.MID')
            ->where('N.Type', 'document')
            ->where('N.MID', $Modules->MID)
            ->where('N.CID', $Modules->CID)
            ->select('N.*', 'C.Course', 'M.Module')
            ->get();

        $rem = ['id', 'created_at', 'updated_at', 'url', 'CoursePresentation', 'uuid', 'CID', 'MID', 'ModulePresentation', 'type'];

        $FormEngine = new FormEngine;

        $data = [
            'Page'       => 'notes.MgtNotes',
            'Title'      => 'Manage all document notes attached to the selected course',
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

    public function SaveAndUploadFile($column, $request)
    {
        $fileName = time() . '.' . $request->$column->extension();

        $request->$column->move(public_path('assets/data'), $fileName);

        DB::table($request->TableName)->where('uuid', $request->uuid)->update([

            $column => 'assets/data/' . $fileName,
        ]);
    }

    public function NewDoc(Request $request)
    {

        $request->validate([

            '*'   => 'required',
            'url' => 'required|mimes:pdf,mp4,webm|max:3000048',
            // 'ModulePresentation' => 'required|mimes:pdf,mp4|max:30048',

        ]);

        DB::table($request->TableName)->insert(
            $request->except([
                '_token',
                'TableName',
                'id',
                'files',
            ])
        );

        $this->SaveAndUploadFile('url', $request);

        // $this->SaveAndUploadFile('ModulePresentation', $request);

        return redirect()->back()->with('status', 'The record was created successfully');

    }

    public function DeleteDoc($id)
    {

        $delete = DB::table('notes')->where('id', $id)->first();

        unlink(public_path($delete->url));

        DB::table('notes')->where('id', $id)->delete();

        return redirect()->back()->with('status', 'The selected record was deleted successfully');

    }

    public function SelectCourseVideo()
    {
        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'notes.SelectCourseVideo',
            'Title'   => 'Select the Course Whose Instruction Videos Are To Be Managed',
            'Desc'    => 'Course Instruction Video Settings',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function AcceptCourseVideo(Request $request)
    {

        $validated = $request->validate([
            '*' => 'required',
            // 'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('SelectModuleVideo', ['id' => $id]);
    }

    public function SelectModuleVideo($id)
    {
        $Courses = DB::table('courses')->where('id', $id)->first();
        $Modules = DB::table('modules')->where('CID', $Courses->CID)->get();

        $data = [
            'Page'    => 'notes.SelectModuleVideo',
            'Title'   => 'Select Course Module Whose Instruction Video Are To Be Managed',
            'Desc'    => 'Module Instruction Videos Settings',
            'Modules' => $Modules,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);
    }

    public function AdaptToMgtVideoNotes(Request $request)
    {
        $validated = $request->validate([
            '*' => 'required',
            // 'files' => 'nullable',
        ]);

        $id = $request->id;

        return redirect()->route('MgtCourseVideos', ['id' => $id]);

    }
    public function MgtCourseVideos($id)
    {

        $Modules = DB::table('modules')->where('id', $id)->first();
        $Courses = DB::table('courses')->where('CID', $Modules->CID)->first();

        $Notes = DB::table('courses AS C')
            ->join('modules AS M', 'M.CID', 'C.CID')
            ->join('notes AS N', 'N.MID', 'M.MID')
            ->where('N.Type', 'video')
            ->where('N.MID', $Modules->MID)
            ->where('N.CID', $Modules->CID)
            ->select('N.*', 'C.Course', 'M.Module')
            ->get();

        $rem = ['id', 'created_at', 'updated_at', 'url', 'CoursePresentation', 'uuid', 'CID', 'MID', 'ModulePresentation', 'type'];

        $FormEngine = new FormEngine;

        $data = [
            'Page'       => 'notes.MgtVideoNotes',
            'Title'      => 'Manage all document notes attached to the selected course',
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