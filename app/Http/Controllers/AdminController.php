<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function AdminDashboard() {

        return view('admin.index');   //look this file in views

    } //end method


    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('admin/login');
        
        return redirect('/login');
    }

    public function AdminLogin() {
        
        return view('admin.admin_login');
    }
}
