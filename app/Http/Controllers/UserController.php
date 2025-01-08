<?php

namespace App\Http\Controllers;

use App\Exports\ExportStudent;
use App\Helpers\ApiResponse;
use App\Http\Requests\ImportStudentsRequset;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function importStudent(ImportStudentsRequset $request)
    {
        // Ensure a valid file is uploaded
        if (!$request->hasFile('file')) {
            return ApiResponse::sendResponse('Invalid File', ['error' => 'No file uploaded.']);
        }

        // Process the import
        try {
            Excel::import(new StudentsImport(), $request->file('file')->store('files'));
            return ApiResponse::sendResponse('Students imported successfully', []);
        } catch (\Exception $e) {
            return ApiResponse::sendResponse('Import failed', ['error' => $e->getMessage()]);
        }
    }

    public function exportStudent()
    {
        try {
            return Excel::download(new ExportStudent(), 'Students.xlsx');
        } catch (\Exception $e) {
            return ApiResponse::sendResponse('Export failed', ['error' => $e->getMessage()]);
        }
    }
}
