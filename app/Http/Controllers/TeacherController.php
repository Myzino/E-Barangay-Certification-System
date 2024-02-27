<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function TeacherPage() {

        return view('teacher');   //look this file in views

    } //end method
}
