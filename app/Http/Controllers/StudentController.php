<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * GET ALL STUDENTS
     */
    public function index()
    {
        try {

            $students = Student::all();

            return response()->json([
                'success' => true,
                'message' => 'Students Fetched Successfully',
                'data' => $students
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to Fetch Students',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * CREATE NEW STUDENT
     */
    public function store(Request $request)
    {
        try {

            // VALIDATION
            $request->validate([
                'userId' => 'required',
                'classId' => 'required',
                'dob' => 'required',
                'address' => 'required',
                'status' => 'required'
            ]);

            // CREATE STUDENT
            $student = Student::create([
                'userId' => $request->userId,
                'classId' => $request->classId,
                'dob' => $request->dob,
                'address' => $request->address,
                'status' => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Student Created Successfully',
                'data' => $student
            ], 201);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to Create Student',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * UPDATE STUDENT
     */
    public function update(Request $request, $id)
    {
        try {

            // FIND STUDENT
            $student = Student::find($id);

            // CHECK IF EXISTS
            if (!$student) {
                return response()->json([
                    'success' => false,
                    'message' => 'Student Not Found'
                ], 404);
            }

            // VALIDATION
            $request->validate([
                'userId' => 'required',
                'classId' => 'required',
                'dob' => 'required',
                'address' => 'required',
                'status' => 'required'
            ]);

            // UPDATE STUDENT
            $student->update([
                'userId' => $request->userId,
                'classId' => $request->classId,
                'dob' => $request->dob,
                'address' => $request->address,
                'status' => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Student Updated Successfully',
                'data' => $student
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to Update Student',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * DELETE STUDENT
     */
    public function destroy($id)
    {
        try {

            // FIND STUDENT
            $student = Student::find($id);

            // CHECK IF EXISTS
            if (!$student) {
                return response()->json([
                    'success' => false,
                    'message' => 'Student Not Found'
                ], 404);
            }

            // DELETE STUDENT
            $student->delete();

            return response()->json([
                'success' => true,
                'message' => 'Student Deleted Successfully'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to Delete Student',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}