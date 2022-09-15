<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormEngine;
use Auth;
use DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function StudentCourses()
    {
        $rem = [
            'id',
            'created_at',
            'updated_at',
            'uuid',
            'CID',
            'MID',
            'ReasonsForJoining',
            'SpecialNeed',
            'Gender',
            'CV',
            'StudentID',
            'ApprovalStatus',
            'StartDate',
            'CourseDuration',
            'Comment',
            'nationality',
            'SpecialNeeds',
        ];

        $FormEngine = new FormEngine();

        $Countries = DB::table('countries')->get();

        $Courses = DB::table('courses AS C')
            ->join('institutions AS  I', 'I.IID', 'C.IID')
            ->select('C.*', 'I.Title')
            ->get();

        $data = [
            'Page'      => 'f-courses.ViewCourses',
            'Title'     => 'View all courses',
            'Desc'      => 'Our Course Catalogue',
            'Courses'   => $Courses,
            'Countries' => $Countries,
            'NewApp'    => 'true',
            'PDF'       => 'true',
            'rem'       => $rem,
            'Form'      => $FormEngine->Form('students'),
        ];

        return view('front', $data);
    }
    public function NewStudent(Request $request)
    {
        $request->validate([
            '*'         => 'required',
            'TableName' => 'required',
            // 'CV'        => 'required|mimes:pdf|max:30048',
            'Email'     => 'required|unique:students',
            // 'StudentID' => 'required|mimes:pdf|max:30048',
        ]);

        // $CV = time() . '.' . $request->CV->extension();
        // $request->CV->move(public_path('assets/data'), $CV);

        // $StudentID = time() . '.' . $request->StudentID->extension();
        // $request->StudentID->move(public_path('assets/data'), $CV);

        DB::table($request->TableName)->insert(
            $request->except(['_token', 'TableName', 'id', 'files', 'role'])
        );

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'UserID'            => $request->uuid,
                'role'              => 'PreTest',
                'phone'             => $request->MobileNumber,
                'name'              => $request->Name,
                'ApplicationLetter' => $request->ReasonsForJoining,
                'Institution'       => $request->ParentOrganization,
                'Nationality'       => $request->Nationality,
                'Gender'            => $request->Gender,
            ]);

        // DB::table($request->TableName)
        //     ->where('uuid', $request->uuid)
        //     ->update([
        //         'StudentID' => $StudentID,
        //         'CV'        => $CV,
        //     ]);

        return redirect()
            ->back()
            ->with(
                'status',
                'Your course application has been submitted successfully. The information collected will be applied to all your future course enrollments'
            );
    }

    public function Explore($id)
    {

        $Courses = DB::table('courses')->where('id', $id)
            ->first();

        $counter = DB::table('course_start_registers')
            ->where('CID', $Courses->CID)
            ->where('UserID', \Auth::user()->UserID)
            ->count();

        if ($counter < 1) {
            DB::table('course_start_registers')
                ->insert([
                    "CID"             => $Courses->CID,
                    "UserID"          => \Auth::user()->UserID,
                    "CourseStartDate" => date("Y-m-d"),
                    "created_at"      => date("Y-m-d"),
                ]);
        }

        $Docs = DB::table('notes')
            ->where('CID', $Courses->CID)
            ->where('type', 'document')->get();

        $Videos = DB::table('notes')
            ->where('CID', $Courses->CID)
            ->where('type', 'video')->get();

        $Pres = DB::table('notes')
            ->where('CID', $Courses->CID)
            ->where('type', 'video')->get();

        dd($Docs);
        $data = [
            'Page'   => 'f-courses.Explore',
            'Title'  => 'Explore the course ' . $Courses->Course,
            'Desc'   => 'Course Dashboard',
            "PDF"    => 'true',
            "Docs"   => $Docs,
            "Videos" => $Videos,
            "Pres"   => $Pres,
            // 'rem'   => $rem,
            // 'Form'  => $FormEngine->Form('students'),
        ];

        return view('front', $data);

    }
}