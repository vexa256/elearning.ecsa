<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CrudMiniController;
use Auth;
use DB;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function DeleteData($id, $TableName)
    {
        DB::table($TableName)
            ->where('id', $id)
            ->delete();

        return response()->json([
            'status' => 'true',
        ]);
    }

    public function DeleteDataWeb($id, $TableName)
    {
        DB::table($TableName)
            ->where('id', $id)
            ->delete();

        return redirect()
            ->back()
            ->with('status', 'The record was deleted successfully');

    }

    public function SaveData($request)
    {
        DB::table($request->TableName)->insert(
            $request->except(['_token', 'TableName', 'id', 'files'])
        );
    }

    public function ApiInsert(Request $request)
    {
        if ($request->TableName == 'users') {

            $validated = $request->validate([
                '*'     => 'required',
                'files' => 'nullable',
            ]);

            $password = \Hash::make($request->password);

            $this->SaveData($request);

            DB::table('users')
                ->where('UserID', $request->UserID)
                ->update([
                    'password' => $password,
                ]);

            return response()->json([
                'status' => 'true',
            ]);

        }
        if ($request->TableName == 'exam_timer_logics') {

            $validated = $request->validate([
                '*'              => 'required',
                'AssessmentType' => 'required|unique:exam_timer_logics',
                'files'          => 'nullable',
            ]);

            $this->SaveData($request);

            return response()->json([
                'status' => 'true',
            ]);

        } elseif ($request->TableName == 'attempt_pre_tests') {

            // dd('true');
            $validated = $request->validate([
                '*'     => 'required',
                'files' => 'nullable',
            ]);

            DB::table($request->TableName)
                ->insert(
                    $request->except(['_token', 'TableName', 'id', 'files'])
                );

            DB::table('users')
                ->where('UserID', Auth::user()->UserID)
                ->update([
                    'role' => 'student',
                ]);

            return response()->json([
                'status' => 'true',
            ]);

        } elseif ($request->TableName == 'courses') {

            $validated = $request->validate([
                '*'         => 'required',
                'files'     => 'nullable',
                'Thumbnail' => 'required|mimes:png,svg,jpeg,jpg|max:3048',
            ]);

            $this->SaveData($request);

            $fileName = time() . '.' . $request->Thumbnail->extension();

            $request->Thumbnail->move(public_path('assets/data'), $fileName);

            DB::table($request->TableName)
                ->where('uuid', $request->uuid)
                ->update([
                    'Thumbnail' => $fileName,
                ]);

            return response()->json([
                'status' => 'true',
            ]);

        } elseif ($request->TableName == 'modules') {
            $validated = $request->validate([
                '*'                  => 'required',
                'files'              => 'nullable',
                'ModulePresentation' => 'required|mimes:pdf|max:10048',
            ]);

            $this->SaveData($request);

            $fileName = time() . '.' . $request->ModulePresentation->extension();

            $request->ModulePresentation->move(public_path('assets/data'), $fileName);

            DB::table($request->TableName)
                ->where('uuid', $request->uuid)
                ->update([
                    'ModulePresentation' => $fileName,
                ]);

            return response()->json([
                'status' => 'true',
            ]);
        } else {
            $validated = $request->validate([
                '*'     => 'required',
                'files' => 'nullable',
            ]);

            $this->SaveData($request);

            return response()->json([
                'status' => 'true',
            ]);
        }
    }

    public function ApiMassUpdate(Request $request)
    {
        $validated = $this->validate($request, [
            '*'                  => 'required',
            'files'              => 'nullable',
            'ModulePresentation' => 'nullable',
        ]);

        DB::table($request->TableName)
            ->where('id', $request->id)

            ->update($request->except(['_token', 'ModulePresentation', 'TableName', 'id', 'files']));

        if ($request->hasFile('ModulePresentation')) {

            $del = DB::table($request->TableName)
                ->where('id', $request->id)
                ->first();

            unlink(public_path('assets/data/' . $del->ModulePresentation));

            $fileName = time() . '.' . $request->ModulePresentation->extension();

            $request->ModulePresentation
                ->move(public_path('assets/data'), $fileName);

            DB::table($request->TableName)->where('id', $request->id)
                ->update([

                    'ModulePresentation' => $fileName,

                ]);
        }

        return response()->json([
            'status' => 'true',
        ]);
    }

    public function MassInsert(Request $request)
    {
        $CrudMiniController = new CrudMiniController;

        return $CrudMiniController->MassInsert($request);
    }

    public function MassUpdate(Request $request)
    {
        $CrudMiniController = new CrudMiniController;

        return $CrudMiniController->MassUpdate($request);
    }

}