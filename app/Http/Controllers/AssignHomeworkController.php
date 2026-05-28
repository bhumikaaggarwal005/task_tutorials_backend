<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignHomework;
use App\Models\Enrollment;
use App\Models\ClassModel;
use App\Models\Faculty;

class AssignHomeworkController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GET ALL ASSIGNED HOMEWORKS
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | ADMIN GETS ALL ASSIGNED HOMEWORKS
        |--------------------------------------------------------------------------
        */

        if (auth()->user()->role_id == 3) {

            $homeworks = AssignHomework::with('class')->get();

            return response()->json([

                'success' => true,

                'message' => 'All assigned homeworks fetched successfully',

                'data' => $homeworks

            ], 200);
        }

        /*
        |--------------------------------------------------------------------------
        | FACULTY GETS ONLY THEIR CLASS HOMEWORKS
        |--------------------------------------------------------------------------
        */

        if (auth()->user()->role_id == 2) {

            $faculty = Faculty::where('user_id', auth()->id())

                ->first();

            $class_ids = ClassModel::where('faculty_id', $faculty->id)

                ->pluck('id');

            $homeworks = AssignHomework::whereIn('class_id', $class_ids)

                ->with('class')

                ->get();

            return response()->json([

                'success' => true,

                'message' => 'Faculty assigned homeworks fetched successfully',

                'data' => $homeworks

            ], 200);
        }

        /*
        |--------------------------------------------------------------------------
        | STUDENT GETS ONLY ENROLLED CLASS HOMEWORKS
        |--------------------------------------------------------------------------
        */

        $class_ids = Enrollment::where('user_id', auth()->id())

            ->where('status', 'approved')

            ->pluck('class_id');

        $homeworks = AssignHomework::whereIn('class_id', $class_ids)

            ->with('class')

            ->get();

        return response()->json([

            'success' => true,

            'message' => 'Student assigned homeworks fetched successfully',

            'data' => $homeworks

        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE ASSIGNED HOMEWORK
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([

            'class_id' => 'required|exists:classes,id',

            'topic' => 'required',

            'status' => 'required'
        ]);

        /*
        |--------------------------------------------------------------------------
        | ONLY ADMIN AND FACULTY CAN CREATE
        |--------------------------------------------------------------------------
        */

        if (!in_array(auth()->user()->role_id, [2, 3])) {

            return response()->json([

                'success' => false,

                'message' => 'Unauthorized access'

            ], 403);
        }

        /*
        |--------------------------------------------------------------------------
        | FACULTY CAN ONLY CREATE FOR OWN CLASS
        |--------------------------------------------------------------------------
        */

        if (auth()->user()->role_id == 2) {

            $faculty = Faculty::where('user_id', auth()->id())

                ->first();

            $class = ClassModel::where('id', $request->class_id)

                ->where('faculty_id', $faculty->id)

                ->first();

            if (!$class) {

                return response()->json([

                    'success' => false,

                    'message' => 'You can only create homework for your own classes'

                ], 403);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE ASSIGNED HOMEWORK
        |--------------------------------------------------------------------------
        */

        $homework = AssignHomework::create([

            'class_id' => $request->class_id,

            'topic' => $request->topic,

            'description' => $request->description,

            'due_date' => $request->due_date,

            'status' => $request->status
        ]);

        return response()->json([

            'success' => true,

            'message' => 'Assigned homework created successfully',

            'data' => $homework

        ], 201);
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE ASSIGNED HOMEWORK
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $homework = AssignHomework::find($id);

        if (!$homework) {

            return response()->json([

                'success' => false,

                'message' => 'Assigned homework not found'

            ], 404);
        }

        /*
        |--------------------------------------------------------------------------
        | ONLY ADMIN AND FACULTY CAN DELETE
        |--------------------------------------------------------------------------
        */

        if (!in_array(auth()->user()->role_id, [2, 3])) {

            return response()->json([

                'success' => false,

                'message' => 'Unauthorized access'

            ], 403);
        }

        /*
        |--------------------------------------------------------------------------
        | FACULTY CAN ONLY DELETE OWN CLASS HOMEWORK
        |--------------------------------------------------------------------------
        */

        if (auth()->user()->role_id == 2) {

            $faculty = Faculty::where('user_id', auth()->id())

                ->first();

            $class = ClassModel::where('id', $homework->class_id)

                ->where('faculty_id', $faculty->id)

                ->first();

            if (!$class) {

                return response()->json([

                    'success' => false,

                    'message' => 'You can only delete your own class homework'

                ], 403);
            }
        }

        $homework->delete();

        return response()->json([

            'success' => true,

            'message' => 'Assigned homework deleted successfully'

        ], 200);
    }
}