<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResidentController extends Controller
{
    public function index() {
        //$residents = Student::all();  Fetch all students from the database
        // return view('student.index', ['students' => $students]);
        return view('app.residents.index');
    }
}
