<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormEngine;
use DB;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function MgtCourses()
    {
        $rem = ['id', 'IID', 'TotalPreTests', 'CoursePresentation', 'TotalExercises', 'TotalModules', 'created_at', 'updated_at', 'uuid', 'CID', 'CourseThumbnail', 'ApprovalStatus'];

        $FormEngine = new FormEngine();

        $Institutions = DB::table('institutions')->get();

        $Courses = DB::table('courses AS C')
            ->join('institutions AS I', 'I.IID', 'C.IID')
            ->select('I.Title', 'I.VeryBriefDescription', 'C.*')
            ->get();

        $data = [
            'Page'         => 'courses.MgtCourses',
            'Title'        => 'Manage all courses supported by this platform',
            'Desc'         => 'Course Settings and Management',
            'Courses'      => $Courses,
            // 'Countries'    => $Countries,
            'Institutions' => $Institutions,
            'rem'          => json_encode($rem),
            'Form'         => $FormEngine->Form('courses'),
        ];

        return view('courses.MgtCourses', $data)->render();
    }

    public function ManageInstitutions()
    {

        $FormEngine = new FormEngine();

        $Institutions = DB::table('institutions')->get();
        $rem          = ['id', 'created_at', 'updated_at', 'IID', 'uuid'];

        $data = [
            'Page'         => 'institutions.MgtInst',
            'Title'        => 'Manage all institutions operating courses on the platform',
            'Desc'         => 'institutions Settings and Management',
            'Institutions' => $Institutions,
            'rem'          => json_encode($rem),
            'Form'         => $FormEngine->Form('institutions'),
        ];

        // return view('scrn', $data);

        return view('institutions.MgtInst', $data)->render();

    }

    public function SaveNewCourse(Request $request)
    {
        $validated = $request->validate([
            '*'                  => 'required',
            'files'              => 'nullable',
            'CourseThumbnail'    => 'required|mimes:png,svg,jpeg,jpg|max:3048',
            'CoursePresentation' => 'required|mimes:pdf|max:9048',
        ]);

        DB::table($request->TableName)->insert(
            $request->except(['_token', 'TableName', 'id', 'files'])
        );

        $fileName = time() . '.' . $request->CourseThumbnail->extension();

        $request->CourseThumbnail->move(public_path('assets/data'), $fileName);

        DB::table($request->TableName)
            ->where('uuid', $request->uuid)
            ->update([
                'CourseThumbnail' => $fileName,
            ]);

        $fileName = time() . '.' . $request->CoursePresentation->extension();

        $request->CoursePresentation->move(public_path('assets/data'), $fileName);

        DB::table($request->TableName)
            ->where('uuid', $request->uuid)
            ->update([
                'CoursePresentation' => $fileName,
            ]);

        return response()->json([
            'status' => 'true',
        ]);
    }

    public function UploadFile($request, $string)
    {

        $fileName = time() . '.' . $request->$string->extension();

        $request->$string->move(public_path('assets/data'), $fileName);

        DB::table($request->TableName)
            ->where('id', $request->id)
            ->update([
                $string => $fileName,
            ]);
    }

    public function SelectCourseModule()
    {

        $Courses = DB::table('courses')->get();

        $data = [
            'Page'    => 'courses.SelectCourse',
            'Title'   => 'Select course to add modules to ',
            'Desc'    => 'Course Module Settings',
            'Courses' => $Courses,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);

    }

    /* Not Used due to ajax request */
    public function CourseSelectedForModuleSettings(Request $request)
    {
        $validated = $request->validate([
            '*' => 'required',
        ]);

        return redirect()->route('MgtModules', ['id' => $request->id]);

    }

    public function MgtModules(Request $request)
    {
        $id = $request->id;

        $Courses = DB::table('courses')
            ->where('id', '=', $id)
            ->first();

        $Modules = DB::table('modules')
            ->where('CID', '=', $Courses->CID)
            ->get();

        $rem = ['id', 'created_at', 'updated_at', 'ModulePresentation', 'uuid', 'CID', 'MID'];

        $FormEngine = new FormEngine();
        $data       = [
            'Page'       => 'modules.MgtModules',
            'Title'      => 'Manage modules attached to the selected course',
            'Desc'       => $Courses->Course,
            'Modules'    => $Modules,
            'CourseName' => $Courses->Course,
            'CID'        => $Courses->CID,
            'rem'        => $rem,
            'Form'       => $FormEngine->Form('modules'),
        ];

        return view('scrn', $data);

    }

}