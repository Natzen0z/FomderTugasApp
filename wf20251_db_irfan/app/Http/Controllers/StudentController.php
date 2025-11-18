<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        return Student::all();
    }

    public function store(Request $request) {
        return Student::create($request->all());
    }

    public function show($id) {
        return Student::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return $student;
    }

    public function destroy($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        return ['message' => 'deleted'];
    }
}