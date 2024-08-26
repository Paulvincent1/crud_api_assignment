<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function store(Request $request){
        $fields = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'year' => 'required|string|in:First Year,Second Year,Third Year,Fourth Year,Fifth Year',
            'enrolled' => 'required|boolean'
        ]);

        $student = Student::create($fields);

        return response()->json($student, 201);
    }

    public function index(){
        $students = Student::all();

        return response()->json($students, 200);
    }


    public function update(Request $request, Student $id){

        $fields = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'year' => 'required|string|in:First Year,Second Year,Third Year,Fourth Year,Fifth Year',
            'enrolled' => 'required|boolean'
        ]);

        $student = $id->update($fields);

        return response()->json($student, 202);

    }

    public function delete(Student $id){
        $id->delete();

        return response()->json([
            'message' => 'successfuly deleted'
        ]);

    }
}
