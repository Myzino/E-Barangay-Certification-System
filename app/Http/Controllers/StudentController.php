<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function StudentPage() {         //to view student page

        $students = Student::all();

        return view('student', ['students' => $students]);

    } //end method

    // New method to add a student
    public function store(Request $request) {

        // Validate and update the student data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
        ]);

        // Create a new student
        $student = new Student();
        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->age = $request->input('age');
        $student->save();

        return redirect()->route('student')->with('success', 'Student added successfully');
    }

    // New method to update the edited student
    public function update(Request $request, $id)
    {
        // Validate and update the student data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('student')->with('success', 'Student updated successfully');
    }

    // New method to delete a specific student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student')->with('success', 'Student deleted successfully');
    }
}
