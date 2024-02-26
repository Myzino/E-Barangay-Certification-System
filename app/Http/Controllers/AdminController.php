<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;



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

    public function AdminProfile() {
        
        $id = Auth::user()->id;         //access user table authenticated field
        $profileData = User::find($id);

        return view('admin.admin_profile_view',compact('profileData')); //passing through compact method
    }

    public function AdminProfileStore(Request $request) {  //post request to update profile

        $id = Auth::user()->id;         //access user table authenticated field
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')) {
            $file = $request->file('photo');        //reqeusting the photo from database if naa
            @unlink(public_path('upload/admin_images/'.$data->photo));  //replace previous admin image
            $filename = date('YmdHi').$file->getClientOriginalName(); //to avoid similar photo conflict
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();

        //Toaster Part
        $notification = array ( //toaster notif when updated
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }




}