<?php

namespace App\Http\Controllers;     //naa dapat ni sulod sa Http/Controllers/App/ just like UserController pero dili man ga work so gi gawas nalang nako

use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function index() {
        //$residents = Student::all();  Fetch all students from the database
        // return view('student.index', ['students' => $students]);
        return view('app.residents.index');
    }
}
