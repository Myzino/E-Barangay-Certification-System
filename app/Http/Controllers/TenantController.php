<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CredentialsMail;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('domains')->get();

        return view('tenants.index', ['tenants' => $tenants]);

    }

    public function TenantDashboard() {

        return view('app.index');
    }

    public function TenantProfile() {

        $id = Auth::user()->id;         //access user table authenticated field
        $profileData = User::find($id);

        return view('app.profile',compact('profileData')); //passing through compact method
    }

    public function TenantProfileStore(Request $request) {  //post request to update profile

        $id = Auth::user()->id;         //access user table authenticated field
        $data = User::find($id);
        $data->username = $request->username;   //the user input is stored in database
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));  //replace previous admin image
            $filename = date('YmdHi').$file->getClientOriginalName(); //to avoid similar photo conflict
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();

        $notification = array ( //toaster notif when updated
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function TenantIndigency() {

        return view('app.indigency');
    }

    public function TenantResidence() {

        return view('app.residence');
    }

    public function TenantClearance() {

        return view('app.clearance');
    }

    public function TenantLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('/admin/login');     //commented because we are using the same loginpage for users and admin's, after logout they will be redirected to that page

        // return redirect('/login');
        return redirect('/');                   //warag mas chada ni

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'domain-name' => 'required|string|max:255|unique:domains,domain',

        ]);

        // Generate a random password
        $randomPassword = Str::random(10); // Generate a random password of 10 characters

        $realPass = $randomPassword;
        $tenant = Tenant::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => $randomPassword,
        ]);

        // Create the associated domain record
        $tenant->domains()->create([
            'domain' => $request['domain-name'] . '.' . config('app.domain')
        ]);
        
        if (!$tenant) {
            //Send email with user data
            return redirect(route('tenants.index'))->with("error", "Invalid username or password!");
        } else {
            Mail::to($request->email)->send(new CredentialsMail($tenant, $realPass));
            return redirect(route('tenants.index'))->with("success", "Tenant added successfully!");
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}