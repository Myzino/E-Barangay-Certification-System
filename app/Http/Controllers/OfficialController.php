<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;



class OfficialController extends Controller
{
    public function OfficialDashboard() {

        return view('official.index');   //look this file in views

    } //end method

}
