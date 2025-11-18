<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index() {
        return Enrollment::all();
    }

    public function store(Request $request) {
        return Enrollment::create($request->all());
    }

    public function show($id) {
        return Enrollment::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $data = Enrollment::findOrFail($id);
        $data->update($request->all());
        return $data;
    }

    public function destroy($id) {
        $data = Enrollment::findOrFail($id);
        $data->delete();
        return ['message' => 'deleted'];
    }
}