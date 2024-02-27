<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function StudentPage() {

        return view('student');   //look this file in views

    } //end method
}
